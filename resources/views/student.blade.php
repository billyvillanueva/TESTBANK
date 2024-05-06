<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student user') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end p-2">
            <x-primary-button type="button" id="submit" class=" w-25 flex justify-center" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('add student') }}</x-primary-button>
            </div>
      
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="">Student No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Year & Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas)
                        <tr>
                        <th scope="row">{{$datas -> studentNumber}}</th>
                        <td>{{$datas -> studentName}}</td>
                        <td>{{$datas -> student_year_course}}</td>
                 
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<div id="exampleModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('addStudent')}}" method="post">
        {{ csrf_field() }}
                    <div>
                        <x-input-label for="stud_no." :value="__('Student Number')" />
                        <x-text-input id="stud_no." name="stud_no" class="mt-1 block w-full " autocomplete="stud_no" />
                    </div>
                    <div>
                        <x-input-label for="stud_name" :value="__('Student Name')" />
                        <x-text-input id="stud_name" name="stud_name" type="text" class="mt-1 block w-full" autocomplete="stud_name" />
                
                    </div>
                    <div>
                        <x-input-label for="stud_yr_course" :value="__('Student Year & Course ')" />
                        <x-text-input id="stud_yr_course" name="stud_yr_course" type="text" class="mt-1 block w-full" autocomplete="stud_yr_course" />
                
                    </div>
      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
        </form>
    </div>
  </div>
</div>
