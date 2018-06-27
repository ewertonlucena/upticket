<div class="container-fluid">
    <div class="row breadcrumb-search border-bottom border-dark ">
        <div class="col d-flex align-items-center border-right border-dark">
            <nav class="d-none d-md-block" aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0 pl-1">
                    <li class="breadcrumb-item d-sm-inline-block active" style="padding-left: 0px;">
                        <a class="btn btn-link px-1" href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item " style="padding-left: 0px;">
                        <a class="btn btn-link px-1" href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item " aria-current="page" style="padding-left: 0px;">
                        <a class="btn btn-link px-1 " href="#">Dashboard</a>
                    </li>
                </ol>
            </nav>
            <nav class="d-md-none">
                <div class="dropdown drop-ticket">
                    <button class="btn btn-link dropdown-toggle" type="button" id="FastMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tickets Pendentes
                    </button>
                    <div class="dropdown-menu fastmenu bg-light pt-3" aria-labelledby="FastMenu"> 
                        
                        <span class="dropdown-header fa-lg">                    
                            TICKETS
                        </span>
                        <hr class="blurred">
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center active" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <hr class="blurred">
                        <span class="dropdown-header fa-lg">                    
                            TAREFAS
                        </span>
                        <hr class="blurred">
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            <span class="drop-item">Seus Tickets</span>
                            <span class="badge badge-blue badge-pill">1</span>
                        </a>                
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-end pl-0"
            <form method="POST" class="search-form form-inline justify-content-end" role="form" style="width: 200px;">
                <div class="form-group m-0 collapse width" id="SearchArea" aria-labelledby="SearchArea">
                    <div class="d-flex d-inline-block">
                        <input type="text" class="form-control form-control-sm mr-1 " name="fastSearch" placeholder="Pesquisar"/>
                        <button type="submit" class="btn btn-sm btn-search">
                            <span class="fas fa-search"></span>
                        </button>
                    </div>
                </div>
                <div class="btn btn-sm btn-search p-0 m-0 d-flex align-items-center justify-content-center open-form" data-toggle="collapse" data-target="#SearchArea"  aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-search"></span>
                </div>
            </form>
        </div>
    </div>
    <div class="row tiled-area mt-3">
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="dash-tile dash-tile-blue d-flex align-items-center justify-content-center">
                <div class="tile-icon">
                    <i class="far fa-inbox-in"></i>
                </div> 
                <div class="tile-content pb-4">
                    <div class="tile-info">
                        0
                    </div>
                    <span class="tile-text">
                        Tickets Novos
                    </span>
                </div>                
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
           <div class="dash-tile dash-tile-red d-flex align-items-center justify-content-center">
                <div class="tile-icon">
                    <i class="far fa-inbox" style="font-size: 4.9rem; top: 0.8rem;"></i>
                </div> 
                <div class="tile-content pb-4">
                    <div class="tile-info">
                        0
                    </div>
                    <span class="tile-text">
                        Tickets Pendentes
                    </span>
                </div>                
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="dash-tile dash-tile-violet d-flex align-items-center justify-content-center">
                <div class="tile-icon">
                    <i class="far fa-list-ul"></i>
                </div> 
                <div class="tile-content pb-4">
                    <div class="tile-info">
                        0
                    </div>
                    <span class="tile-text">
                        Tarefas Novas
                    </span>                                       
                </div>                
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="dash-tile dash-tile-magenta d-flex align-items-center justify-content-center">
                <div class="tile-icon">
                    <i class="far fa-tasks"></i>
                </div> 
                <div class="tile-content pb-4">
                    <div class="tile-info">
                        0
                    </div>
                    <span class="tile-text">
                        Tarefas Pendentes
                    </span>
                </div>                
            </div>
        </div>
    </div>
    <div class="row ticket-area" >
        <div class="col-lg-3 col-md-4 d-md-block d-none">            
            <div class="fastmenu bg-light"> 
                <hr class="blurred">
                <span class="dropdown-header fa-lg">                    
                    TICKETS
                </span>
                <hr class="blurred">
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center active" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <hr class="blurred">
                <span class="dropdown-header fa-lg">                    
                    TAREFAS
                </span>
                <hr class="blurred">
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span class="drop-item">Seus Tickets</span>
                    <span class="badge badge-blue badge-pill">1</span>
                </a>    
            </div>
        </div>
        <div class="col bg-primary">
            ...
        </div>
    </div>
</div>