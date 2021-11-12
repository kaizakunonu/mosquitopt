<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Showing details for <strong> {{$project->title}} </strong> project
        </h2>
    </x-slot>
    <!-- Page Content -->
    <div class="flex flex-wrap">
        <div class="flex-1 ...">
            <x-auth-card>
                <x-slot name="logo">
                    <h3><strong> Project Pane </strong></h3>
                </x-slot>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>
                <x-table>
                    <caption>
                        Review each item and scroll down to the end to edit the project where necessary
                    </caption>
                    <thead>
                    </thead>
                    <tbody>
                    <!-- Project Code (PC) -->
                    <tr>
                        <x-th> Project Code (PC)</x-th>
                        <x-td> {{ $project->pc }} </x-td>
                    </tr>
                    <!--Project Title-->
                    <tr>
                        <x-th> Project Title </x-th>
                        <x-td> {{ $project->title }} </x-td>
                    </tr>
                    <!-- Project Leader's / Coordinator's ID -->
                    <tr>
                        <x-th> Project Leader's / Coordinator's  ID </x-th>
                        <x-td> {{ $project->pl }} </x-td>
                    </tr>
                    <!-- Project Administrator's ID -->
                    <tr>
                        <x-th> Project Administrator's ID </x-th>
                        <x-td > {{ $project->pa }} </x-td>
                    </tr>
                    <!--Project Start Date -->
                    <tr>
                        <x-th> Project Start Date </x-th>
                        <x-td> {{ $project->sd }} </x-td>
                    </tr>
                    <!--Project End Date -->
                    <tr>
                        <x-th> Project End Date </x-th>
                        <x-td> {{ $project->ed }} </x-td>
                    </tr>
                    <!--Project Description -->
                    <tr>
                        <x-th> Project Description </x-th>
                        <x-td> {{ $project->description }} </x-td>
                    </tr>
                    <!--Project Funder's Id -->
                    <tr>
                        <x-th> Funding Partner's ID </x-th>
                        <x-td> {{ $project->funder }} </x-td>
                    </tr>
                    <!--Project Department -->
                    <tr>
                        <x-th> Primary Department </x-th>
                        <x-td> {{ $project->department }} </x-td>
                    </tr>
                    <!-- Project Actions -->
                    <tr>
                        <x-td colspan="2">
                            <div class="flex items-center justify-end mt-4">
                                <x-a href="{{ route('projects.index') }}">
                                    {{ __('Show me all my projects') }}
                                </x-a>
                                <a href="{{ route('projects.edit',[$project->uuid]) }}">

                                    <x-button class="ml-4">
                                        {{ __('I want to edit this project') }}
                                    </x-button>
                                </a>
                            </div>
                        </x-td>
                    </tr>
                    </tbody>
                </x-table>
            </x-auth-card>
        </div>

        <!-- Action Pane -->
        <diV class="flex-1 ...">
            <x-auth-card>
                <x-slot name="logo">
                    <h3> <strong> Experiments Pane </strong> </h3>
                </x-slot>

                <x-table>
                    <caption>
                        Experiment Actions related to this project
                    </caption>
                    <thead>
                    <tr>
                        <x-th scope="row"> Informed Consent (IC) </x-th>
                        <x-th scope="row"> Experiment Design (ED) </x-th>
                        <x-th scope="row"> Sample Sorting (SS) </x-th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Show an index of all records -->
                    <tr>
                        <!-- IC -->
                        <x-td>
                            <x-a href="{{ route( 'ics.index', [ 'pc'=>$project->pc, 'pt'=> $project->title, ]) }}" >
                                Show all IC records related to this project
                            </x-a>
                        </x-td>
                        <!-- ED -->
                        <x-td>
                            <x-a href="{{ route( 'eds.index', [ 'pc'=>$project->pc, 'pt'=>$project->title, ]) }}" >
                                    Show all ED records related to this project
                            </x-a>
                        </x-td>
                        <!-- SS -->
                        <x-td>
                            <x-a href="{{ route( 'sss.index', [ 'pc'=>$project->pc, 'pt'=> $project->title, ]) }}" >
                                    Show all SS records related to this project
                            </x-a>
                        </x-td>
                    </tr>
                    <!-- Download an empty experiment template -->
                    <tr>
                        <!-- Informed Consent (IC) -->
                        <x-td>
                            <x-a href="{{ route( 'ics.create', [ 'pc' => $project->pc, 'pt'=>$project->title ] ) }}" >

                                Download an empty informed consent template for this project
                            </x-a>
                        </x-td>
                        <!-- Experiment Design (ED) -->
                        <x-td>
                            <x-a href="{{ route( 'eds.create', [ 'pc' => $project->pc, 'pt'=>$project->title ] ) }}" >
                                    Download an empty experiment design template for this project
                            </x-a>
                        </x-td>
                        <!-- Sample Sorting (SS) -->
                        <x-td>
                            <x-a href="{{ route( 'sss.create', [ 'pc' => $project->pc, 'pt'=>$project->title ] ) }}" >
                                    Download an empty sample sorting template for this project
                            </x-a>
                        </x-td>
                    </tr>
                    </tbody>
                </x-table>
            </x-auth-card>
        </diV>
    </div>
    <!-- Footer -->
    <x-footer></x-footer>
</x-app-layout>
