<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width:60%">
<div class="modal-content">
<div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cartheader" id="myModalLabel">Food Cart</h4>
</div>
<div class="modal-body" id="cart-info">
<?php echo form_open('cart/update'); ?>
      
        <?php if($this->session->flashdata('success')): ?>
                
                <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success') ?>
                </div>

        <?php elseif($this->session->flashdata('failed')): ?>

                <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('failed') ?>
                </div>

        <?php endif; ?>

        <table cellpadding="6" cellspacing="1" border="0" class="table table-striped table-bordered" >

        <tr>
                <th>No.</th>
                <th>QTY</th>
                <th>Item Description</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo form_input(array('name' => 'quantity[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                        <td><?php echo $items['name']; ?> </td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

        <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>

        </table>
        <!-- Get URL -->
        <!-- <input type="hidden" value="<?php echo uri_string(); ?>" name="url"> -->
        
                <?php echo form_submit('', 'Update your Cart', array('class' => "btn btn-primary")); ?>
                <a href="<?php echo base_url('cart/checkout'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Checkout</button></a>
                </form>
                
        
</div>
</div>
</div>
</div>