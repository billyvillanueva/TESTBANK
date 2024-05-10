<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

@viteReactRefresh
@vite('resources/js/app.js')
<div id="quizpage"></div>



  


       
                </div>
            </div>
        </div>
    </div>   
   
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // Make columns resizable
        $("#resizable").find("th, td").resizable({
            handles: "e"
        });

        // Make rows resizable
        $("#resizable").find("tr").resizable({
            handles: "s",
            minHeight: 50
        });
    });
</script>
