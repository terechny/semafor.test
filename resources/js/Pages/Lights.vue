<script setup>

</script>

<template>
    <div class="container mx-auto bg-slate-100 mt-10 rounded-lg">
        
        <div class="flex flex-row justify-center p-5">    
            <div class="flex items-center mx-8">{{ this.counter }}  {{ this.currentColorName }}</div>       
            <div class="border-2 border-slate-300 rounded-full">  
                    <div class="bg-green-600 rounded-full m-5 size-12" :class="{'bg-green-200': this.active.green}"></div>
                    <div class="bg-yellow-500 rounded-full m-5 size-12" :class="{'bg-yellow-200': this.active.yellow}"></div>
                    <div class="bg-red-600 rounded-full m-5 size-12" :class="{'bg-red-200': this.active.red}"></div>
            </div>
            <div class="flex items-center mx-8">
                <button type="button" v-on:click="action" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">Вперёд</button>
            </div>
        </div>

        <div>

           
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">

                                <tr>

                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Log text</th>
                                    <th scope="col" class="px-6 py-4">Data</th>

                                </tr>

                            </thead>
                            <tbody>
                                
                                <tr v-for="(log, index) in logs" :key="index" class="border-b dark:border-neutral-500">

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ index }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ log.text }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ log.created_at }}</td>

                                </tr>

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>          

        </div>

    </div>

</template>


<script>

    import axios from 'axios'

    export default {

        data(){

            return{
                s: {},
                colors: [
                    { name:'green', next:1, time:5 },
                    { name:'yellow', next:2, time:2 },
                    { name:'red', next:3, time:5 },
                    { name:'yellow', next:0, time:2 },
                ],
                currentColorIndex:0,
                currentColorName:'',
                counter:0,
                active: {
                  green: false,
                  yellow:false,
                  red:false
                },
                logs:{},
            }
        },
        mounted(){

            this.getLog()
            
            setInterval(() => {
               this.nextColor()
            }, 1000);
        },
        methods:{
            /* Get logs */
            getLog(){

                axios.get('/api/log').then(res=>{ 

                    this.logs = res.data.data
                    
                }).catch(err => {

                    console.log(err);                           
                }) 
            },

            /* Set next color */
            nextColor(){

                let color = this.colors[ this.currentColorIndex ]

                this.counter++

                if( color.time < this.counter){

                    this.currentColorIndex = color.next

                    color = this.colors[ this.currentColorIndex ]

                    this.counter = 1   
                }                

                this.colorSwitch(color.name)
                
                this.currentColorName = color.name
                   
            },

            /* Set active colors */
            colorSwitch(color_name){

                switch ( color_name ) {
                case 'green':
                    this.setColors(true, false, false) 
                    break;
                case 'yellow':
                    this.setColors(false, true, false) 
                    break;
                case 'red':
                    this.setColors(false, false, true) 
                    break;
                }
            },

            setColors(green, yellow, red){

                this.active.green = green 
                this.active.yellow = yellow
                this.active.red = red
            },

            /* Set log message */
            action(){

                let msg = [
                    "Проезд на зеленый!",
                    "Успели на желтый!",
                    "Проезд на красный. Штраф!",
                    "Слишком рано начали движение!",
                ]

                this.logCreate(msg[this.currentColorIndex])
            },

            /* Send log create query */
            logCreate(message){

                const formData = {
                    text: message,
                };

                axios.post('/api/log', formData)
                .then(response => {
                
                    this.getLog()
                })
                .catch(error => {
                
                    console.error(error);
                });                  

            },

        },

    }

</script>
