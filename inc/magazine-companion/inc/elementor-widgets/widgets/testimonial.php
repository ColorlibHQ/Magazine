<?php
namespace Magazineelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Magazine elementor section widget.
 *
 * @since 1.0
 */
class Magazine_Testimonial extends Widget_Base {

	public function get_name() {
		return 'magazine-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'magazine' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'magazine-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Testimonial Heading
		$this->start_controls_section(
			'testimonial_heading',
			[
				'label' => __( 'Testimonial Section Heading', 'magazine' ),
			]
		);
		$this->add_control(
			'sect_title', [
				'label' => __( 'Title', 'magazine' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true

			]
		);
		$this->add_control(
			'sect_subtitle', [
				'label' => __( 'Sub Title', 'magazine' ),
				'type'  => Controls_Manager::TEXTAREA,
				'label_block' => true

			]
		);

		$this->end_controls_section(); // End section top content


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'magazine' ),
			]
		);
		$this->add_control(
			'select_style', [
				'label'     => __( 'Testimonial Style', 'magazine' ),
				'type'      => Controls_Manager::SELECT,
                'options'   => [
                     'style_1'  => esc_html__('Carousel Style', 'magazine'),
                     'style_2'  => esc_html__('Column Style', 'magazine')
                ],
                'default'   => 'style_1'

			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'magazine' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'magazine' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Desiganation', 'magazine' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => __('CEO at Google', 'magazine')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'magazine' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'magazine')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'magazine' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Section Heading', 'magazine' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => esc_html__( 'Section Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .title h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .title p',
            ]
        );

        $this->end_controls_section();

        /*------------------------------ Testimonial item Style ------------------------------*/
		$this->start_controls_section(
            'testimonial_item_settings', [
                'label' => __( 'Testimonial Style Settings', 'magazine' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_testimonial_title', [
                'label'     => esc_html__( 'Name Label Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_title_hover', [
                'label'     => esc_html__( 'Testimonial Hover Label Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_testimonial_content', [
                'label'     => esc_html__( 'Testimonial Content Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_bg', [
                'label'     => esc_html__( 'Testimonial Background Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9f9ff99',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_hover_bg', [
                'label'     => esc_html__( 'Testimonial Hover Background Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9f9ff99',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .title p',
            ]
        );
        

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    $sectionTitle = ! empty( $settings['sect_title'] ) ? $settings['sect_title'] : '';
    $subTitle = ! empty( $settings['sect_subtitle'] ) ? $settings['sect_subtitle'] : '';

    ?>
    <section class="testimonial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <?php
                        if( $sectionTitle ) {
                            echo '<h1 class="mb-10">'. $sectionTitle .'</h1>';
                        }
                        if( $subTitle ){
                            echo '<p>'. $subTitle .'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                <?php
                    if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                        foreach ( $settings['review_slider'] as $review ): ?>
                            <div class="single-testimonial item d-flex flex-row">
                                <div class="thumb">
                                    <?php
                                    if ( ! empty( $review['img']['url'] ) ) {
                                        echo magazine_img_tag(
                                            array(
                                                'url'   => esc_url( $review['img']['url'] ),
                                                'class' => esc_attr( 'mg-fluid' )
                                            )
                                        );
                                    } ?>
                                </div>
                                <div class="desc">
                                   <?php 
                                    // Description
                                    if ( ! empty( $review['desc'] ) ) {
                                        echo magazine_get_textareahtml_output( $review['desc'] );
                                    } 
                                    // Name =======
                                    if ( ! empty( $review['label'] ) ) {
                                        echo magazine_heading_tag(
                                            array(
                                                'tag'  => 'h4',
                                                'text' => esc_html( $review['label'] ),
                                                'class' => esc_attr('mt-30')
                                            )
                                        );
                                    } 
                                    // designation
                                    if ( ! empty( $review['designation'] ) ) {
                                        echo magazine_paragraph_tag(
                                            array(
                                                'text' => esc_html( $review['designation'] )
                                            )
                                        );
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
            
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-testimonial').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplayHoverPause: true,
                dots: true,
                autoplay: true,
                nav: true,
                navText: ["<span class='lnr lnr-arrow-up'></span>", "<span class='lnr lnr-arrow-down'></span>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
