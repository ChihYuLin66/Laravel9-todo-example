<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div id="app" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="container mx-auto sm:px-4">
                                    <!-- top -->
                                    <div class="center">
                                        <h1>To Do</h1>
                                    </div>
                                    <hr>
                                
                                    <!-- input -->
                                    <div class="relative flex items-stretch w-full mb-3">
                                        <input 
                                            type="text" 
                                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                            v-model="newTaskContent"
                                        >
                                        <button 
                                            type="button" 
                                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700" 
                                            @click="store()"
                                        >Add</button>
                                    </div>
                                
                                    <div class="relative flex items-stretch w-full mb-3">
                                        <p v-for="todo in todos" :key="todo.id">
                                            @{{ todo.content }} 
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
        const { createApp } = Vue;
        const apiUrl = '/api/todos';
        
        createApp({
            data() {

                return {
                    todos: [],
                    currentId: null,
                    newTaskContent: '',
                }
            },
            methods: {
                getList() {
                    axios
                      .get(apiUrl)
                      .then((response) => {
                        this.todos = response.data.data;

                        console.log(response.data.data);
                      })
                },
                store() {
                    let content = this.newTaskContent;
                    axios
                      .post(apiUrl, { content })
                      .then((response) => {
                        console.log(response);
                      })
                },
                update() {
                    let id = this.currentId;
                    let content = this.content;
                    axios
                      .patch(apiUrl, { id, content })
                      .then((response) => {

                        console.log(response);
                      })
                },
                delete() {
                    let id = this.currentId;
                    let content = this.content;
                    axios
                      .delete(apiUrl, { id, content })
                      .then((response) => {

                        console.log(response);
                      })
                }
            },
            mounted() {
                this.getList();
            }
        }).mount('#app')

        </script>
    </body>
</html>
