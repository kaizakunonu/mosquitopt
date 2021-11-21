<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editing <strong> {{$project->title}} </strong> project
        </h2>
    </x-slot>

    <!-- Page Content -->
    <x-auth-card>
        <x-slot name="logo">
            Select an item to edit, and scroll down to update the project
        </x-slot>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

    {!! Form::model( $project, ['route'=> ['projects.update', $project->uuid], 'method' => 'PUT']) !!}


    <!-- Project Investigator's ID -->
        <div>
            {{ Form::label('pi','Project Investigator(PI) ID') }}
            {{ Form::number('pi',$project->pi,['class'=>"block mt-1 w-full",
                                               'placeholder'=>'Project Investigator\'s ID',
                                               'readonly'=>true]) }}
        </div>
        <br>

        <!-- Project Code (PC) -->
        <div>
            {{ Form::label('pc','Project code (PC)') }}
            {{ Form::text('pc', $project->pc, ['class'=>"block mt-1 w-full",
                                                   'placeholder'=>'Project Title',
                                                   'autofocus'=>true])}}
        </div>
        <br>

        <!-- Project Title -->
        <div>
            {{ Form::label('title','Title') }}
            {{ Form::text('title',$project->title,['class'=>"block mt-1 w-full",
                                                   'placeholder'=>'Project Title' ]) }}
        </div>
        <br>

        <!-- Project Leader/Coordinator (PL) ID -->
        <div>
            {{ Form::label( 'pl', 'Project Leader/Coordinator (PL) ID' ) }}
            {{ Form::text( 'pl',  $project->pl, [ 'class' => "block mt-1 w-full",
                                                'placeholder' => 'Project Leader/Coordinator (PL)', ] ) }}
        </div>
        <br>

        <!-- Project Administrator (PA) ID -->
        <div>
            {{ Form::label( 'pa', 'Project Administrator (PA) ID' ) }}
            {{ Form::text( 'pa',  $project->pa, [ 'class' => "block mt-1 w-full",
                                                'placeholder' => 'Project Administrator (PA)', ] ) }}
        </div>
        <br>

        <!-- Project Start Date -->
        <div>
            {{ Form::label( 'sd','Start Date') }}
            {{ Form::date( 'sd', $project->sd, [ 'class' => "block mt-1 w-full", ] ) }}
        </div>
        <br>

        <!-- Project End Date -->
        <div>
            {{ Form::label( 'ed','End Date' ) }}
            {{ Form::date( 'ed', $project->ed, [ 'class' => "block mt-1 w-full", ] ) }}
        </div>
        <br>

        <!-- Description -->
        <div>
            {{ Form::label('description','Description')}}
            {{ Form::textarea('description', $project->description, ['class'=>"block mt-1 w-full",
                                                                     'placeholder'=>'Describe your projects here']) }}
        </div>
        <br>

        <!-- Project Funder's ID -->
        <div>
            {{ Form::label('funder','Project Funder\'s ID')}}
            {{ Form::text('funder', $project->funder, ['class'=>"block mt-1 w-full",
                                                        'placeholder'=>'Project Funder\'s ID']) }}
        </div>
        <br>

        <!-- Department -->
        <div>
            {{ Form::label( 'department', 'Department' ) }}
            {{ Form::select('department', [ 'ehes' => 'Environmental Health and Ecological Sciences',
                                            'ict' => 'Interventions and Clinical Trials',
                                            'hsiep' => 'Health Systems, Impact Evaluation, and Policy',],
                                             $project->department )  }}


            <br>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('projects.show',[$project->uuid]) }}">
                {{ __('Discard changes?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Update the project') }}
            </x-button>
        </div>
        {!!Form::close()!!}
    </x-auth-card>
</x-app-layout>

