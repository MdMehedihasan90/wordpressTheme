<?php
namespace codexpert\Woolementor_Pro;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use codexpert\Woolementor\Controls\Group_Control_Gradient_Text;

class Payment_Methods extends Widget_Base {

	public $id;

	public function __construct( $data = [], $args = null ) {
	    parent::__construct( $data, $args );

	    $this->id = woolementor_get_widget_id( __CLASS__ );
	    $this->widget = woolementor_get_widget( $this->id );
	    
		// Are we in debug mode?
		$min = defined( 'WOOLEMENTOR_PRO_DEBUG' ) && WOOLEMENTOR_PRO_DEBUG ? '' : '.min';

		wp_register_style( "woolementor-{$this->id}", plugins_url( "assets/css/style{$min}.css", __FILE__ ), [], '1.1' );
	}

	public function get_script_depends() {
		return [ "woolementor-{$this->id}" ];
	}

	public function get_style_depends() {
		return [ "woolementor-{$this->id}" ];
	}

	public function get_name() {
		return $this->id;
	}

	public function get_title() {
		return $this->widget['title'];
	}

	public function get_icon() {
		return $this->widget['icon'];
	}

	public function get_categories() {
		return $this->widget['categories'];
	}

	protected function _register_controls() {

		
		$this->start_controls_section(
			'payment_section_title',
			[
				'label' => __( 'Section Title', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'payment_title_show',
            [
                'label'         => __( 'Show/Hide Title', 'woolementor-pro' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'woolementor-pro' ),
                'label_off'     => __( 'Hide', 'woolementor-pro' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
		//order_button_text
		$this->add_control(
		    'payment_section_title_text',
		    [
		        'label' 		=> __( 'Text', 'woolementor-pro' ),
		        'type' 			=> Controls_Manager::TEXT,
		        'default' 		=> __( 'Payment Methods', 'woolementor-pro' ) ,
                'condition' => [
                    'payment_title_show' => 'yes'
                ],
		        'dynamic' 		=> [
		            'active' 		=> true,
		        ]
		    ]
		);

		$this->add_control(
			'payment_title_tag',
			[
				'label' 	=> __( 'HTML Tag', 'woolementor-pro' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'h3',
				'options' 	=> [
					'h1'  => __( 'H1', 'woolementor-pro' ),
					'h2'  => __( 'H2', 'woolementor-pro' ),
					'h3'  => __( 'H3', 'woolementor-pro' ),
					'h4'  => __( 'H4', 'woolementor-pro' ),
					'h5'  => __( 'H5', 'woolementor-pro' ),
					'h6'  => __( 'H6', 'woolementor-pro' ),
				],
                'condition' => [
                    'payment_title_show' => 'yes'
                ],
			]
		);

		$this->add_control(
            'payment_title_alignment',
            [
                'label' 	   => __( 'Alignment', 'woolementor-pro' ),
                'type' 		   => Controls_Manager::CHOOSE,
                'options' 	   => [
                    'left' 		=> [
                        'title' 	=> __( 'Left', 'woolementor-pro' ),
                        'icon' 		=> 'fa fa-align-left',
                    ],
                    'center' 	=> [
                        'title' 	=> __( 'Center', 'woolementor-pro' ),
                        'icon' 		=> 'fa fa-align-center',
                    ],
                    'right' 	=> [
                        'title' 	=> __( 'Right', 'woolementor-pro' ),
                        'icon' 		=> 'fa fa-align-right',
                    ],
                ],
                'default' 	=> 'left',
                'toggle' 	=> true,
                'condition' => [
                    'payment_title_show' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .wl-pm-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'payment_methods_content',
			[
				'label' => __( 'Order Button', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		//order_button_text
		$this->add_control(
		    'order_button_text',
		    [
		        'label' 		=> __( 'Button Text', 'woolementor-pro' ),
		        'type' 			=> Controls_Manager::TEXT,
		        'default' 		=> __( 'Place Order', 'woolementor-pro' ) ,
		        'dynamic' 		=> [
		            'active' 		=> true,
		        ]
		    ]
		);

		$this->end_controls_section();

		//section title style
		$this->start_controls_section(
			'payment_title_style',
			[
				'label' => __( 'Title', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'payment_title_show' => 'yes'
                ],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'payment_title_typographyrs',
				'label' 	=> __( 'Typography', 'woolementor-pro' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
				'selector' 	=> '{{WRAPPER}} .wl-pm-title',
			]
		);

		$this->add_group_control(
			Group_Control_Gradient_Text::get_type(),
			[
				'name' => 'payment_title_color',
				'selector' => '{{WRAPPER}} .wl-pm-title',
			]
		);

		$this->end_controls_section();

		/**
		 * Input Label Color
		 */
		$this->start_controls_section(
			'_pm_footer_style',
			[
				'label' => __( 'Payment Methods', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'pm_bg_color',
			[
				'label'     => __( 'Section Background Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->start_controls_tabs('payement methods');

		$this->start_controls_tab(
		    'pm_titles',
		    [
		        'label' => __( 'Titles', 'woolementor-pro' ),
		    ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'pm_typographyrs',
				'label' 	=> __( 'Typography', 'woolementor-pro' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
				'selector' 	=> '{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method label',
			]
		);


        $this->add_control(
			'pm_text_color',
			[
				'label'     => __( 'Text Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    'pm_contents',
		    [
		        'label' => __( 'Contents', 'woolementor-pro' ),
		    ]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'pm_content_typographyrs',
				'label' 	=> __( 'Typography', 'woolementor-pro' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
				'selector' 	=> '{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method .payment_box',
			]
		);


        $this->add_control(
			'pm_content_color',
			[
				'label'     => __( 'Text Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method .payment_box' => 'color: {{VALUE}}',
				],
			]
		);

		 $this->add_control(
			'pm_content_bg_color',
			[
				'label'     => __( 'Background Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method .payment_box' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .wl-pm #payment .wc_payment_methods.payment_methods.methods .wc_payment_method .payment_box::before' => 'border-bottom-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		//section footer style
		$this->start_controls_section(
			'payment_footer_style',
			[
				'label' => __( 'Footer', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'payment_footer_typographyrs',
				'label' 	=> __( 'Typography', 'woolementor-pro' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
				'selector' 	=> '{{WRAPPER}} .form-row.place-order .woocommerce-terms-and-conditions-wrapper',
			]
		);

		$this->add_control(
			'pm_footer_content_color',
			[
				'label'     => __( 'Background Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-row.place-order' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'pm_footer_content_text_color',
			[
				'label'     => __( 'Text Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-row.place-order .woocommerce-terms-and-conditions-wrapper' => 'color: {{VALUE}}',
					'{{WRAPPER}} .form-row.place-order .woocommerce-terms-and-conditions-wrapper a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		//section button style
		$this->start_controls_section(
			'payment_btn_style',
			[
				'label' => __( 'Order Button', 'woolementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'payment_btn_typographyrs',
				'label' 	=> __( 'Typography', 'woolementor-pro' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
				'selector' 	=> '{{WRAPPER}} .form-row.place-order .woocommerce-terms-and-conditions-wrapper button',
			]
		);

		$this->add_control(
			'pm_btn_padding',
			[
				'label'         => __( 'Padding', 'woolementor-pro' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%' ],
				'selectors'     => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'pm_btn_border_radius',
			[
				'label'         => __( 'Border Radius', 'woolementor-pro' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%' ],
				'selectors'     => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'pm_btn_separator',
			[
				'separator' => 'before'
			]
		);

		$this->start_controls_tab(
			'pm_btn_normal',
			[
				'label'     => __( 'Normal', 'woolementor-pro' ),
			]
		);

		$this->add_control(
			'pm_btn_text_color',
			[
				'label'     => __( 'Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'pm_btn_color',
			[
				'label'     => __( 'Background', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'          => 'pm_btn_border',
				'label'         => __( 'Border', 'woolementor-pro' ),
				'selector'      => '{{WRAPPER}} #payment .form-row.place-order #place_order',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'pm_btn_hover',
			[
				'label'     => __( 'Hover', 'woolementor-pro' ),
			]
		);
		
		$this->add_control(
			'pm_btn_text_color_hover',
			[
				'label'     => __( 'Color', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'pm_btn_color_hover',
			[
				'label'     => __( 'Background', 'woolementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .form-row.place-order #place_order:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'          => 'pm_btn_border_hover',
				'label'         => __( 'Border', 'woolementor-pro' ),
				'selector'      => '{{WRAPPER}} #payment .form-row.place-order #place_order:hover',
			]
		);

        $this->add_control(
            'pm_btn_border_hover_transition',
            [
                'label' 	=> __( 'Transition Duration', 'woolementor-pro' ),
                'type' 		=> Controls_Manager::SLIDER,
                'range' 	=> [
                    'px' 	=> [
                        'max' 	=> 3,
                        'step' 	=> 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #payment .form-row.place-order #place_order:hover' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {
		if ( ( is_checkout() && !empty( is_wc_endpoint_url( 'order-received' ) ) ) ) return;
		

		$settings = $this->get_settings_for_display();
		extract( $settings );

		/**
		 * Load attributes
		 */
		$this->render_editing_attributes();

		if( woolementor_is_edit_mode() ) {
			wc_load_cart();
			wc()->frontend_includes();
			?>
			<style type="text/css">.woocommerce-checkout #payment div.form-row{padding-bottom:2em}.wl .button{padding:8px;margin-top:-20px}</style>
			<?php
		}
		if ( !is_ajax() ) {
			do_action( 'woocommerce_review_order_before_payment' );
		}

		/**
		 * We need to force payment options to show up in the edit screen
		 */
		add_filter( 'woocommerce_cart_needs_payment', function( $needs_payment, $cart ){
			if( woolementor_is_edit_mode() ) {
				return true;
			}
			return $needs_payment;
		}, 10, 2 );

		if( 'yes' == $payment_title_show ):

			printf( '<%1$s %2$s>%3$s</%1$s>',
				esc_attr( $payment_title_tag ),
				$this->get_render_attribute_string( 'payment_section_title_text' ),
				esc_html( $payment_section_title_text )
			);

		endif; 

		echo woolementor_notice( sprintf( __( 'Are you facing any issues with the checkout page? Please <a href="%s", target="_blank">click here and follow the instruction</a> to get things ready!', 'woolementor-pro' ), 'https://help.codexpert.io/docs/woolementor/my-checkout-page-isnt-working/' ), '<i class="eicon-warning"></i> ' . __( 'Problem with checkout?', 'woolementor-pro' ) );
		?>

		<div class="wl-pm">
			<div id="payment" class="woocommerce-checkout-payment">
				<?php if ( !is_null( WC()->cart ) && WC()->cart->needs_payment() ) : ?>
					<ul class="wc_payment_methods payment_methods methods">
					<?php
					if( woolementor_is_edit_mode() ) {
						if ( !empty( $available_gateways = WC()->payment_gateways->get_available_payment_gateways() ) ) {
							foreach ( $available_gateways as $gateway ) {
								wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );							
							}
							?>
							<script>
								jQuery(function($){
									$('.wc_payment_method input').change(function(e){
										$('.payment_box').slideUp()
										if( $(':checked',this) ) {
											$('.payment_box',$(this).parent()).slideToggle()
										}
									})
								})
							</script>
							<?php
						} else {
							echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
						}
					} // woolementor_is_edit_mode()
					?>
					</ul>
				<?php endif; ?>
				<div class="form-row place-order">
					<noscript>
						<?php
						/* translators: $1 and $2 opening and closing emphasis tags respectively */
						printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
						?>
						<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
					</noscript>

					<?php wc_get_template( 'checkout/terms.php' ); ?>

					<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

					<?php echo apply_filters( 'woocommerce_order_button_html', 
						sprintf( '<button %1$s type="submit" name="woocommerce_checkout_place_order" id="place_order" value="%2$s" data-value="%2$s">%2$s</button>',
							$this->get_render_attribute_string( 'order_button_text' ),
							esc_html( $order_button_text )
						)
					); // @codingStandardsIgnoreLine ?>


					<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

					<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
				</div>
			</div>
		</div>
		<?php
		if ( ! is_ajax() ) {
			do_action( 'woocommerce_review_order_after_payment' );
		}
	}

	private function render_editing_attributes() {
		$this->add_inline_editing_attributes( 'payment_section_title_text', 'none' );
		$this->add_render_attribute( 'payment_section_title_text', 'class', 'wl-pm-title' );

		$this->add_inline_editing_attributes( 'order_button_text' );
		$this->add_render_attribute( 'order_button_text', 'class', 'button alt' );
	}

	protected function _content_template() {
		
	}
}

