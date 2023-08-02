@if($authuser->divisi == "admin")
<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon fa-thin fa-house"></i>
        <p>
            Home
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('user') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Users
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('customer') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Customers
        </p>
    </a>
</li>

@elseif ($authuser->divisi == "qa_staff")
<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon far fa-house"></i>
        <p>
            Home
        </p>
    </a>
</li>
<li class="nav-header">DATA</li>

<li class="nav-item">
    <a href="{{ url('barang') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
          Tambah Data Barang NG
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('barangproses') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Daftar Barang NG
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('barangselesaistaff') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Barang Repair
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('perbaikanstaff') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Barang Scrap
        </p>
    </a>
</li>

@elseif ($authuser->divisi == "qa_leader")
<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon fas fa-house"></i>
        <p>
            Home
        </p>
    </a>
</li>
<li class="nav-header">DATA</li>

<li class="nav-item">
    <a href="{{ url('barangselesai') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Barang Repair
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('perbaikan') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Scarp
        </p>
    </a>
</li>
@endif