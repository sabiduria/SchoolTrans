<ul class="metismenu left-sidenav-menu">
    <li class="menu-label mt-0">Main</li>
    <li>
        <?= $this->Html->link('<i data-feather="link" class="align-self-center menu-icon"></i>Affectations', ['controller'=>'affectations', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="layers" class="align-self-center menu-icon"></i>Cobalt Packets', ['controller'=>'cohbags', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="layers" class="align-self-center menu-icon"></i>Copper Packets', ['controller'=>'cubundle', 'action'=>'index'], ['escape'=>false]) ?>
    </li>

    <hr class="hr-dashed hr-menu">
    <li class="menu-label my-2">Components & Extra</li>

    <li>
        <?= $this->Html->link('<i data-feather="users" class="align-self-center menu-icon"></i>Users', ['controller'=>'users', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
    <li>
        <?= $this->Html->link('<i data-feather="settings" class="align-self-center menu-icon"></i>Settings', ['controller'=>'users', 'action'=>'index'], ['escape'=>false]) ?>
    </li>
</ul>
