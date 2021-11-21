<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new project. Change the world
        </h2>
    </x-slot>

    <!-- Page Content -->
    <x-auth-card>
        <x-slot name="logo">
            All fields are required
        </x-slot>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

    {!! Form::open( [ 'route' => 'projects.store', 'method' => 'POST' ] ) !!}


    <!-- Principal Investigator (PI) ID -->
        <div>
            {{ Form::label( 'pi', 'Principal Investigator (PI) ID' ) }}
            {{ Form::number( 'pi', $uid, [ 'class' => "block mt-1 w-full",
                                            'placeholder' => 'Principal Investigator\'s ID',
                                            'readonly'=> true ] ) }}
        </div>
        <br>

        <!-- Project Code (PC) -->
        <div>
            {{ Form::label( 'pc', 'Project Code (PC)' ) }}
            {{ Form::text( 'pc', old( 'pc' ), [ 'class' => "block mt-1 w-full",
                                                'placeholder' => 'Project Code (PC)',
                                                'autofocus' => true ] ) }}
        </div>
        <br>

        <!-- Project Title -->
        <div>
            {{ Form::label( 'title', 'Title' ) }}
            {{ Form::text( 'title', old( 'title' ), [ 'class' => "block mt-1 w-full",
                                                      'placeholder' => 'Project Title', ] ) }}
        </div>
        <br>

        <!-- Project Leader/Coordinator (PL) ID -->
        <div>
            {{ Form::label( 'pl', 'Project Leader/Coordinator (PL) ID' ) }}
            {{ Form::text( 'pl', old( 'pl' ), [ 'class' => "block mt-1 w-full",
                                                'placeholder' => 'Project Leader/Coordinator (PL)', ] ) }}
        </div>
        <br>

        <!-- Project Administrator (PA) ID -->
        <div>
            {{ Form::label( 'pa', 'Project Administrator (PA) ID' ) }}
            {{ Form::text( 'pa', old( 'pa' ), [ 'class' => "block mt-1 w-full",
                                                'placeholder' => 'Project Administrator (PA)', ] ) }}
        </div>
        <br>

        <!-- Project Start Date -->
        <div>
            {{ Form::label( 'sd', 'Project Start Date' ) }}
            {{ Form::date( 'sd', old( 'sd' ), [ 'class' => "block mt-1 w-full", ] ) }}
        </div>
        <br>

        <!-- Project End Date -->
        <div>
            {{ Form::label( 'ed', 'Project End Date' ) }}
            {{ Form::date( 'ed', old( 'ed' ), [ 'class' => "block mt-1 w-full", ] ) }}
        </div>
        <br>

        <!-- Project Description -->
        <div>
            {{ Form::label('description','Description') }}
            {{ Form::textarea('description', old('description'), ['class'=>"block mt-1 w-full",
                                                                  'placeholder'=>'Describe your project here'
                                                                  ]) }}
        </div>
        <br>

        <!-- Project Funding Partner ID -->
        <div>
            {{ Form::label( 'funder', 'Funding Partner ID' ) }}
            {{ Form::text( 'funder', old( 'funder' ), [ 'class' => "block mt-1 w-full",
                                                          'placeholder' => 'Funding Partner ID' ] ) }}
        </div>
        <br>

        <!-- Department -->
        <div>
            {{ Form::label( 'department', 'Department' ) }}
            {{ Form::select('department', [ 'Environmental Health and Ecological Sciences' => 'Environmental Health and Ecological Sciences',
                                            'Interventions and Clinical Trials' => 'Interventions and Clinical Trials',
                                            'Health Systems, Impact Evaluation, and Policy' => 'Health Systems, Impact Evaluation, and Policy',],
                                            'Environmental Health and Ecological Sciences' )  }}

        </div>
        <br>

        <br>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('projects.index') }}">
                {{ __('Work on an existing project instead?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Create project') }}
            </x-button>
        </div>
        {!!Form::close()!!}
    </x-auth-card>
</x-app-layout>
