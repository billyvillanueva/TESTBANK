<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                

    <style>

        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exam Result Dashboard</h1>
        <table>
            <tr>
                <th>Level of Difficulty</th>
                <th>Percentage</th>
            </tr>
            <tr>
                <td>Easy</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>Average</td>
                <td>0%</td>
            </tr>
            <tr>
                <td>Hard</td>
                <td>0%</td>
            </tr>
            <!-- Add more subjects as needed -->
        </table>
        <a href="#" class="btn">View Detailed Report</a>
    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
