<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Export File') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <button id="exportButton" class="btn btn-primary">Export Data</button>
                
<script>
    document.getElementById('exportButton').addEventListener('click', function() {
        // Dummy data for demonstration purposes
        var data = [
            { name: 'John', age: 30, city: 'New York' },    
            { name: 'Jane', age: 25, city: 'Los Angeles' },
            { name: 'Doe', age: 40, city: 'Chicago' }
        ];

        // Convert data to CSV format
        var csv = 'Name,Age,City\n';
        data.forEach(function(item) {
            csv += item.name + ',' + item.age + ',' + item.city + '\n';
        });

        // Create a blob with the CSV data
        var blob = new Blob([csv], { type: 'text/csv' });

        // Create a link element to trigger the download
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = 'exported_data.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
</script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
