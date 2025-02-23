<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transport> $transports
 */

use App\Controller\GeneralController;

?>
<div class="transports index content mt-3">
    <?= $this->Html->link(__('New Transport'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    <h3><?= __('Transports') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" id="datatable-buttons">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Body</th>
                    <th>Encoding</th>
                    <th>Status</th>
                    <th>Submission Date</th>
                    <th>Credit Cost</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Loop through each message and create a row
            foreach ($filtered_messages as $message) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($message['id']) . "</td>";
                echo "<td>" . htmlspecialchars($message['from']) . "</td>";
                echo "<td>" . htmlspecialchars($message['to']) . "</td>";
                echo "<td>" . htmlspecialchars($message['body']) . "</td>";
                echo "<td>" . htmlspecialchars($message['encoding']) . "</td>";
                echo "<td>" . htmlspecialchars($message['status']['type']) . "</td>";
                echo "<td>" . htmlspecialchars($message['submission']['date']) . "</td>";
                echo "<td>" . htmlspecialchars($message['creditCost']) . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
