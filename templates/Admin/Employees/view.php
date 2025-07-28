<style>
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.styled-table th, .styled-table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.status {
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 4px;
}

.status.active {
    color: green;
}

.status.inactive {
    color: red;
}

.detail-box {
    background: #f9f9f9;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.document-section {
    display: flex;
    gap: 20px;
}

.document {
    flex: 1;
    text-align: center;
}

.document-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.button {
    display: inline-block;
    padding: 8px 12px;
    margin: 5px 0;
    text-decoration: none;
    background: #007bff;
    color: white;
    border-radius: 4px;
}

.button-danger {
    background: #dc3545;
}

.button-success {
    background: #28a745;
}

.download-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
.download-btn:hover {
    background-color: #0056b3;
}

</style>
<div class="row">
  

    <div class="column-responsive column-80">
        <div class="employees view content">
            <h2 class="employee-name"><?= h($employee->user->name ?? 'Employee') ?></h2>
            <table class="styled-table">
                <tr>
                    <th><?= __('User') ?></th>
                    <td>
                        <?= $employee->has('user') ? $this->Html->link($employee->user->name, ['controller' => 'Users', 'action' => 'view', $employee->user->id]) : '-' ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($employee->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $employee->phone ? h($employee->phone) : '-' ?></td>
                </tr>
                <tr>
                    <th><?= __('DOB') ?></th>
                    <td><?= h($employee->dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('DOJ') ?></th>
                    <td><?= h($employee->doj) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($employee->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($employee->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>
                        <span class="status <?= $employee->is_active ? 'active' : 'inactive' ?>">
                            <?= $employee->is_active ? __('✅ Active') : __('❌ Inactive') ?>
                        </span>
                    </td>
                </tr>
            </table>

            <h3 class="section-title">Additional Details</h3>
            <div class="detail-box">
                <strong><?= __('Address') ?>:</strong>
                <p><?= h($employee->address) ?: 'N/A' ?></p>
            </div>
            <div class="detail-box">
                <strong><?= __('Designation') ?>:</strong>
                <p><?= h($employee->designation) ?: 'N/A' ?></p>
            </div>
            <div class="detail-box">
                <strong><?= __('Salary Details') ?>:</strong>
                <p><?= h($employee->salary_details) ?: 'N/A' ?></p>
            </div>
            <div class="detail-box">
                <strong><?= __('Bank Account Details') ?>:</strong>
                <p><?= h($employee->bank_account_details) ?: 'N/A' ?></p>
            </div>

            <h3 class="section-title">Documents</h3>
            <div class="document-section">
    <div class="document">
        <strong><?= __('Pan Card') ?>:</strong>
        <?php if (!empty($employee->pan_card)) : ?>
            <?php $panFile = $this->Url->build('/upload/allfile/' . $employee->pan_card, ['fullBase' => true]); ?>
            <?php if (preg_match('/\.pdf$/i', $employee->pan_card)) : ?>
                <iframe src="<?= $panFile ?>" width="100%" height="200px"></iframe>
            <?php else : ?>
                <a href="<?= $panFile ?>" target="_blank">
                    <img src="<?= $panFile ?>" class="document-img">
                </a>
            <?php endif; ?>
            <br>
            <a href="<?= $panFile ?>" download class="download-btn">📥 Download PAN Card</a>
        <?php else : ?>
            <p>No PAN Card Uploaded</p>
        <?php endif; ?>
    </div>

    <div class="document">
        <strong><?= __('Aadhar Card') ?>:</strong>
        <?php if (!empty($employee->aadhar_card)) : ?>
            <?php $aadharFile = $this->Url->build('/upload/allfile/' . $employee->aadhar_card, ['fullBase' => true]); ?>
            <?php if (preg_match('/\.pdf$/i', $employee->aadhar_card)) : ?>
                <iframe src="<?= $aadharFile ?>" width="100%" height="200px"></iframe>
            <?php else : ?>
                <a href="<?= $aadharFile ?>" target="_blank">
                    <img src="<?= $aadharFile ?>" class="document-img">
                </a>
            <?php endif; ?>
            <br>
            <a href="<?= $aadharFile ?>" download class="download-btn">📥 Download Aadhar Card</a>
        <?php else : ?>
            <p>No Aadhar Card Uploaded</p>
        <?php endif; ?>
    </div>
</div>



            <h3 class="section-title">Professional Details</h3>
            <div class="detail-box">
                <strong><?= __('Educational Qualifications') ?>:</strong>
                <p><?= h($employee->educational_qualifications) ?: 'N/A' ?></p>
            </div>
            <div class="detail-box">
                <strong><?= __('Work Experience') ?>:</strong>
                <p><?= h($employee->work_experience) ?: 'N/A' ?></p>
            </div>
        </div>
    </div>
</div>
