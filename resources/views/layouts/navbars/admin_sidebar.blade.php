<ul class="nav">
    <x-nav-link-single route="dashboard" icon="icon-grid" label="Dashboard" />

    <x-dropdown id="exams_type" label="Exams Type" icon="icon-book">
        <x-dropdown-link route="exams.index" label="View All" />
        <x-dropdown-link route="exams.create" label="Add Type" />
    </x-dropdown>

    <x-dropdown id="classes" label="Classes" icon="icon-layout">
        <x-dropdown-link route="classes" label="View All" />
        <x-dropdown-link route="classes" label="Add Class" />
    </x-dropdown>

    <x-dropdown id="subjects" label="Subjects" icon="icon-book">
        <x-dropdown-link route="subjects" label="View All" />
        <x-dropdown-link route="subjects" label="Add Subject" />
    </x-dropdown>

    <x-dropdown id="users" label="Users" icon="icon-head">
        <x-dropdown-link route="subjects" label="View All" />
        <x-dropdown-link route="subjects" label="Add New" />
    </x-dropdown>
</ul>
