<ul class="nav">
    <x-nav-link-single route="dashboard" icon="icon-grid" label="Dashboard" />

    <x-dropdown id="exams_type" label="Exams Type" icon="icon-book">
        <x-dropdown-link route="exams.index" label="View All" />
        <x-dropdown-link route="exams.create" label="Add Type" />
    </x-dropdown>

    {{-- <x-dropdown id="classes" label="Classes" icon="icon-layout">
        <x-dropdown-link route="levels.index" label="View All" />
        <x-dropdown-link route="levels.create" label="Add Class" />
    </x-dropdown> --}}

    <x-dropdown id="subjects" label="Subjects" icon="icon-book">
        <x-dropdown-link route="subjects.index" label="View All" />
        <x-dropdown-link route="subjects.create" label="Add Subject" />
    </x-dropdown>

    <x-dropdown id="question_type" label="Question Types" icon="icon-book">
        <x-dropdown-link route="question_type" label="View All" />
        <x-dropdown-link route="question_type.create" label="Add Type" />
    </x-dropdown>

    <x-dropdown id="resources" label="Resources" icon="icon-layout">
        <x-dropdown-link route="resources" label="View All" />
        <x-dropdown-link route="resoures.create" label="Add Pasco" />
    </x-dropdown>

    <x-dropdown id="users" label="Users" icon="icon-head">
        <x-dropdown-link route="subjects.store" label="View All" />
        <x-dropdown-link route="subjects.store" label="Add New" />
    </x-dropdown>
</ul>
