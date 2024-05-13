<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end p-6">
                <div class="w-50 flex justify-end">
                    <div id="searchQuiz" class="w-75"></div> 
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr {
        height: 50px; /* Initial row height */
    }

    .ui-resizable-helper {
        border: 2px dotted #000;
    }

    .ui-resizable-se {
        width: 10px;
        height: 10px;
        background-color: #fff;
        border: 1px solid #000;
        cursor: se-resize;
        position: absolute;
        bottom: 0;
        right: 0;
    }
</style>
<h2>Quiz</h2>

<!-- add row -->
@viteReactRefresh
@vite('resources/js/app.js')
<div id="quizpage"></div>
<div class="flex justify-between">
<x-primary-button data-bs-toggle="modal" data-bs-target="#AddQuizModal" data-bs-whatever="@mdo">{{__('Add Row')}}</x-primary-button>
<div id="paginateQuiz"></div>
</div>



                                                                  
<div class="modal fade" id="AddQuizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
        {{ csrf_field() }}
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Question:</label>
            <textarea name="Question" class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">A:</label>
            <input name="Aa" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">B:</label>
            <input name="Ab" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">C:</label>
            <input name="Ac" type="text" class="form-control" id="recipient-name">
          </div><div class="mb-3">
            <label for="recipient-name" class="col-form-label">D:</label>
            <input name="Ad" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">key:</label>
            <input name="Akey" type="text" class="form-control" id="recipient-name">
          </div>
          <x-primary-button formaction="{{route('addQuiz')}}">{{__('Add Row')}}</x-primary-button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end add row -->

<form method="post" action="{{route('saveEdit')}}"> 
{{ csrf_field() }}
    <div id="EditPortal"></div>
</form>

  


       
                </div>
            </div>
        </div>
    </div>   
   
</x-app-layout>
