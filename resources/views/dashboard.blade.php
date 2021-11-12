<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard: All of the projects you are working on') }}
        </h2>
    </x-slot>

    <!-- Page Content -->
    <x-auth-card>
        <x-slot name="logo">
            <h3><strong> Welcome back </strong></h3>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if(!empty($projects))
                            <table class="border-separate border border-green-800 rounded-md ...">
                                <thead>
                                <tr>
                                    <th class="border border-green-600 bg-green-500 rounded-md ...">
                                        Project Code (PC)
                                    </th>
                                    <th class="border border-green-600 bg-green-500 rounded-md ...">
                                        Project Title
                                    </th>
                                </tr>
                                </thead>
                                <caption> Click on a project title to view its details</caption>
                                <tbody>

                                @foreach($projects as $project)

                                    <tr>
                                        <td class="border border-green-600 bg-green-100 rounded-md ...">
                                            <p>
                                                {{ $project->pc }}
                                            </p>
                                        </td>

                                        <td class="border border-green-600 bg-green-100 rounded-md ...">
                                            <p>
                                                <a href="{{route('projects.show', $project->uuid)}}">{{$project->title}}
                                                </a>
                                            </p>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        @else
                            <p>
                                You currently do not have a project to work on.
                            </p>
                            <br>
                            <br>
                            <br>
                            <x-button>
                                <a href="{{route('projects.create')}}">
                                    Create a project
                                </a>
                            </x-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-auth-card>

    <!-- Footer -->
    <x-footer>
    </x-footer>
</x-app-layout>
