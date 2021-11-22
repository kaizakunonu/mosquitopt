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
                            <x-table class="caption-top">
                                <caption> Click on a project title to view its details </caption>
                                <thead>
                                <tr>
                                    <x-th>
                                        Project Code (PC)
                                    </x-th>
                                    <x-th>
                                        Project Title
                                    </x-th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($projects as $project)

                                    <tr>
                                        <x-td>
                                            <p>
                                                {{ $project->pc }}
                                            </p>
                                        </x-td>

                                        <x-td>
                                            <p>
                                                <a href="{{route('projects.show', $project->uuid)}}">{{$project->title}}
                                                </a>
                                            </p>
                                        </x-td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </x-table>
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
</x-app-layout>
