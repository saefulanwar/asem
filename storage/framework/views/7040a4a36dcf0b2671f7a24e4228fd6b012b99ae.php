<div class="panel panel-default">
<div class="panel-heading">Cart</div>
<div class="panel-body">
<table class="table table-condensed">
<thead>
<tr>
<th style="width:50%">Produk</th>
<th style="width:20%">Jumlah</th>
<th style="width:30%">Harga</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $cart->details(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td data-th="Produk"><?php echo e($order['detail']['name']); ?></td>
<td data-th="Jumlah" class="text-center"><?php echo e($order['quantity']); ?></td>
<td data-th="Harga" class="text-right"><?php echo e(number_format($order['detail']['price'])); ?></td>
</tr>
<tr>
<td data-th="Subtotal">Subtotal</td>
<td data-th="Subtotal" class="text-right" colspan="2">Rp<?php echo e(number_format($order['subtotal'])); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<tfoot>
<tr>
<td><strong>Total</strong></td>
<td class="text-right" colspan="2"><strong>Rp<?php echo e(number_format($cart->totalPrice())); ?></strong></td>
</tr>
</tfoot>
</table>
</div>
</div>