<ul class="metismenu left-sidenav-menu">
    <li class="menu-label mt-0">Main</li>
    <li>
        <?= $this->Html->link('<i data-feather="home" class="align-self-center menu-icon"></i>Dashboard', ['controller'=>'/'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="link" class="align-self-center menu-icon"></i>Vehicles', ['controller'=>'vehicles', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Drivers', ['controller'=>'drivers', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="activity" class="align-self-center menu-icon"></i>Rides', ['controller'=>'transports', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="credit-card" class="align-self-center menu-icon"></i>Payments', ['controller'=>'payments', 'action'=>'index'], ['escape'=>false]) ?>
    </li>

    <hr class="hr-dashed hr-menu">
    <li class="menu-label my-2">Components & Extra</li>

    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Users', ['controller'=>'users', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="settings" class="align-self-center menu-icon"></i>Profiles', ['controller'=>'profiles', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
</ul>
