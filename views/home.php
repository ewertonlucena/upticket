<div class="container-fluid">
    <div class="row breadcrumb-search border-bottom border-dark ">
        <div class="col d-flex align-items-center border-right border-dark">
            <nav class="d-none d-md-block" aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0 pl-1">
                    <li class="breadcrumb-item d-sm-inline-block  " style="padding-left: 0px;">
                        <a class="btn btn-link px-1 active" href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item d-sm-inline-block" style="padding-left: 0px;">
                        <a class="btn btn-link px-1" href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">
                        <a class="btn btn-link px-1 " href="#">Dashboard</a>
                    </li>
                </ol>
            </nav>
            <nav class="d-md-none">
                <div class="dropdown drop-ticket">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropTicketMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tickets Pendentes
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropTicketMenu">
                        <a class="dropdown-item fa-sm">Seus Tickets</a>
                        <a class="dropdown-item fa-sm active">Tickets Pendentes</a>
                        <a class="dropdown-item fa-sm">Seus Tickets</a>
                        <a class="dropdown-item fa-sm">Seus Tickets</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-end pl-0"
            <form method="POST" class="search-form form-inline justify-content-end" role="form" style="width: 200px;">
                <div class="form-group m-0 collapse width" id="SearchArea" aria-labelledby="SearchArea">
                    <div class="d-flex d-inline-block">
                        <input type="text" class="form-control-sm mr-1 " name="fastSearch" placeholder="Pesquisar"/>
                        <button type="submit" class="btn btn-sm btn-info">
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
            <div class="dash-tile bg-danger d-flex align-items-center justify-content-center">
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
           <div class="dash-tile bg-info d-flex align-items-center justify-content-center">
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
            <div class="dash-tile bg-success d-flex align-items-center justify-content-center">
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
            <div class="dash-tile bg-primary d-flex align-items-center justify-content-center">
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
    <div class="row ticket-area bg-secondary" >
        <div class="col-md-3 d-md-block d-none">
            ...
        </div>
        <div class="col-md bg-primary">
            ...
        </div>
    </div>
</div>