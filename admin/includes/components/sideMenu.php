            
            <a href="./" class="dashboard__main__sidebar__item <?= PAGE=="home"?"active":"" ?> ">
                <div class="dashboard__main__sidebar__item__icon"><i class="fas fa-home"></i></div> 
                <div class="dashboard__main__sidebar__item__text">Home</div>
            </a>
            <a href="engage" class="dashboard__main__sidebar__item <?= PAGE=="engage"?"active":"" ?> ">
                <div class="dashboard__main__sidebar__item__icon"><i class="fas fa-list"></i></div> 
                <div class="dashboard__main__sidebar__item__text">Engagement Tasks</div>
            </a>
            <a href="add" class="dashboard__main__sidebar__item <?= PAGE=="addtask"?"active":"" ?> ">
                <div class="dashboard__main__sidebar__item__icon"><i class="fas fa-plus"></i></div> 
                <div class="dashboard__main__sidebar__item__text">Add Tasks</div>
            </a>
            <a href="users" class="dashboard__main__sidebar__item <?= PAGE=="users"?"active":"" ?> ">
                <div class="dashboard__main__sidebar__item__icon"><i class="fas fa-credit-card"></i></div> 
                <div class="dashboard__main__sidebar__item__text">Users</div>
            </a>
            <a href="?logout" class="dashboard__main__sidebar__item">
                <div class="dashboard__main__sidebar__item__icon"><i class="fas fa-sign-out-alt"></i></div> 
                <div class="dashboard__main__sidebar__item__text">Logout</div>
            </a>