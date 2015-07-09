<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SUN TASK</a>
        </div>


        <div class="collapse navbar-collapse" id="mobile-nav">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Browse Tasks <span class="sr-only">(current)</span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#task-create">Create Task</a></li>
            </ul>

            <div class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" v-model="searchKey" v-on="keyup: search | key 'enter' ">
                </div>
            </div>
        </div>

    </div>
</nav>