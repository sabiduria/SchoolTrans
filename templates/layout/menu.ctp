<ul class="metismenu left-sidenav-menu">
    <li class="menu-label mt-0">Main</li>
    <li>
        <?= $this->Html->link('<i data-feather="home" class="align-self-center menu-icon"></i>Dashboard', ['controller'=>'/'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="link" class="align-self-center menu-icon"></i>Vehicules', ['controller'=>'vehicles', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Chauffeurs', ['controller'=>'drivers', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="activity" class="align-self-center menu-icon"></i>Courses', ['controller'=>'transports', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="credit-card" class="align-self-center menu-icon"></i>Payements', ['controller'=>'payments', 'action'=>'index'], ['escape'=>false]) ?>
    </li>

    <hr class="hr-dashed hr-menu">
    <li class="menu-label my-2">Components & Extra</li>

    <li>
        <?= $this->Html->link('<i data-feather="link-2" class="align-self-center menu-icon"></i>Assignations', ['controller'=>'assignments', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Parents', ['controller'=>'users', 'action'=>'index', 'p'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Utilisateurs', ['controller'=>'users', 'action'=>'index', 'u'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="settings" class="align-self-center menu-icon"></i>Profiles', ['controller'=>'profiles', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
</ul>
