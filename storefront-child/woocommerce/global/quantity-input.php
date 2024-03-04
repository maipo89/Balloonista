
<div class="quantity custom-quantity-selector">
    <button type="button" class="minus" >-</button>
    <input 
        type="number" 
        id="<?php echo esc_attr( $input_id ); ?>" 
        class="input-text qty text" 
        step="<?php echo esc_attr( $step ); ?>" 
        min="<?php echo esc_attr( $min_value ); ?>" 
        max="<?php echo esc_attr( $max_value ); ?>" 
        name="<?php echo esc_attr( $input_name ); ?>" 
        value="<?php echo esc_attr( $input_value ); ?>" 
        title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" 
        size="4" 
        inputmode="<?php echo esc_attr( $inputmode ); ?>" />
    <button type="button" class="plus" >+</button>
</div>
