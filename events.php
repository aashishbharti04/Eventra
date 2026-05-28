<?php
// Legacy fragment kept for backward compatibility. New event listing logic lives in viewEvent.php.
// This file used to be included inside a while-loop; now we just render a small inline card so old includes still work.
if (!isset($row)) return;
$img   = htmlspecialchars(trim($row['img_link']  ?? ''));
$title = htmlspecialchars($row['event_title']    ?? 'Untitled');
$price = (int)($row['event_price']               ?? 0);
$date  = htmlspecialchars($row['Date']           ?? '');
$time  = htmlspecialchars($row['time']           ?? '');
$loc   = htmlspecialchars($row['location']       ?? '');
$stuC  = htmlspecialchars($row['st_name']        ?? '');
$stfC  = htmlspecialchars($row['name']           ?? '');
?>
<div class="event-card mb-4">
    <div class="row g-0">
        <div class="col-md-5">
            <div class="e-img h-100" style="background-image:url('<?php echo $img; ?>'); min-height:240px;"></div>
        </div>
        <div class="col-md-7">
            <div class="e-body">
                <span class="price"><i class="bi bi-cash-coin me-1"></i>₹<?php echo $price; ?></span>
                <h4><?php echo $title; ?></h4>
                <div class="e-meta">
                    <div><i class="bi bi-calendar3"></i> <?php echo $date; ?></div>
                    <div><i class="bi bi-clock"></i> <?php echo $time; ?></div>
                    <div><i class="bi bi-geo-alt"></i> <?php echo $loc; ?></div>
                    <div><i class="bi bi-person"></i> Student lead: <?php echo $stuC; ?></div>
                    <div><i class="bi bi-person-badge"></i> Staff lead: <?php echo $stfC; ?></div>
                </div>
                <div class="actions">
                    <a href="register.php" class="btn btn-app"><i class="bi bi-bookmark-plus"></i> Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
