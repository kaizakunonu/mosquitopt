<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Showing all of your own created projects') }}
        </h2>
    </x-slot>
    <!-- Page Content -->
    @if($own_projects->isNotEmpty())
        <div class="flex flex-wrap">
            <div class="flex-1 ...">
                <x-auth-card>
                    <x-slot name="logo">
                        <h3><strong> My projects pane </strong></h3>
                    </x-slot>

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <x-table class="caption-top">
                                        <caption>
                                            Click on a project title to view its details
                                        </caption>
                                        <thead>
                                        <tr>
                                            <x-th> Project
                                                Code (PC)
                                            </x-th>
                                            <x-th> Project
                                                Title
                                            </x-th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($own_projects as $project)

                                            <tr>
                                                <x-td>
                                                    <p>
                                                        {{ $project->pc }}
                                                    </p>
                                                </x-td>

                                                <x-td>
                                                    <p>
                                                        <a href="{{ route('projects.show', [$project->uuid])}}">
                                                            {{$project->title}}
                                                        </a>
                                                    </p>
                                                </x-td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </x-table>
                                    {{ $own_projects->onEachSide(5)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </x-auth-card>
            </div>
        </div>
    @else
        <x-auth-card>
            <x-slot name="logo">
                <h3>
                    <strong>
                        My projects pane
                    </strong>
                </h3>
            </x-slot>
            <p>
                You currently have no projects
            </p>
            <br>

            <p><a href="{{ route('projects.create') }}">
                    <x-button>
                        Create a new project now
                    </x-button>
                </a>
            </p>
        </x-auth-card>
@endif
</x-app-layout>
