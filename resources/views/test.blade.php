<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exam Maker') }}
        </h2>
    </x-slot>

   
    <style>
       .page.active{
        display:block;
       }
        form .page{
            display: none;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }   
        input[type="text"],
        select {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        form .page{
            display: none;
            flex-direction: column;
        }
        
    </style>
     <form action="#" method="post">
    <div id="page1" class="py-12 page active">
        <div class="mx-auto w-25 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                

 

       
        
            <h2>Exam Details</h2>
            <div>
            <x-input-label for="Department" :value="__('Department')" />
            <x-text-input id="Department" name="department" type="text" class="mt-1 block w-full " autocomplete="department" />
            <span id="error" ></span>
             </div>

        <div>
            <x-input-label for="NoI" :value="__('Name of instructor')" />
            <x-text-input id="NoI" name="NoI" type="text" class="mt-1 block w-full" autocomplete="NoI" />
       
        </div>

        <div>
            <x-input-label for="CC" :value="__('Course code')" />
            <x-text-input id="CC" name="CC" type="text" class="mt-1 block w-full" autocomplete="CC" />
       
        </div>
        <div>
            <x-input-label for="term" :value="__('Term')" />
            <x-text-input id="term" name="term" type="text" class="mt-1 block w-full" autocomplete="term" />
       
        </div>

        <div>
            <x-input-label for="sub" :value="__('Subject')" />
            <x-text-input id="sub" name="sub" type="text" class="mt-1 block w-full" autocomplete="NoI" />
       
        </div>

            <x-input-label for="sub" :value="__('Level of Difficulty')" />
            <select id="difficulty" name="difficulty"  class="mt-1 block w-full">
                <option value="easy">Easy</option>
                <option value="medium">Average</option>
                <option value="hard">Hard</option>
            </select>
            <div class="flex justify-end">
                 <x-primary-button type="button" id="nextButton" class=" w-20 flex justify-center">{{ __('Next') }}</x-primary-button>
            </div>
           
               </div>
            </div>
        </div>
    </div>
           
    
    <div id="page2" class="py-12 page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-25" >
                <div class="p-6 text-gray-900">
                
            <div>
            <x-input-label for="Department" :value="__('Question')" />
            <Textarea id="question" name="question" class="mt-1 block w-full " autocomplete="question" ></Textarea>
       
             </div>
             <div>
            <x-input-label for="A" :value="__('A')" />
            <x-text-input id="A" name="A" type="text" class="mt-1 block w-full" autocomplete="A" />
       
        </div>
        <div>
            <x-input-label for="B" :value="__('B')" />
            <x-text-input id="B" name="B" type="text" class="mt-1 block w-full" autocomplete="B" />
       
        </div>
        <div>
            <x-input-label for="C" :value="__('C')" />
            <x-text-input id="C" name="C" type="text" class="mt-1 block w-full" autocomplete="C" />
       
        </div>
        <div>
            <x-input-label for="D" :value="__('D')" />
            <x-text-input id="D" name="D" type="text" class="mt-1 block w-full" autocomplete="D" />
       
        </div>

        <div>
            <x-input-label for="correctAns" :value="__('Key')" />
            <x-text-input id="correctAns" name="correctAns" type="text" class="mt-1 block w-full" autocomplete="correctAns" />
       
        </div>
        <div class="flex justify-end">
                 <x-primary-button id="submit" class=" w-20 flex justify-center">{{ __('submit') }}</x-primary-button>
        </div>
             </div>
         </div>




            <div class="w-75">
                <div class="p-6 text-gray-900">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto p-6">
                            <table class="table">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                        
                        </tbody>
                        </table>
                   
                    </div>
                 </div>
            </div>
        </div>
    </div>      
    </form>
          
</x-app-layout>
<script>
 document.addEventListener("DOMContentLoaded", function() {
  const nextPageButton = document.getElementById("nextButton");
  const prevPageButton = document.getElementById("prevButton");
  const page1 = document.getElementById("page1");
  const page2 = document.getElementById("page2");


  nextPageButton.addEventListener("click", function() {
    if (document.getElementById("Department").value=="" || document.getElementById("NoI").value=="" || document.getElementById("CC").value=="" || document.getElementById("term").value=="" || document.getElementById("sub").value=="" || document.getElementById("difficulty").value=="") {
        
    }
    else
    {
        page1.classList.remove("active");
        page2.classList.add("active"); 
    }
  
  });

  prevPageButton.addEventListener("click", function() {
    page2.classList.remove("active");
    page1.classList.add("active");
  });


});
</script>