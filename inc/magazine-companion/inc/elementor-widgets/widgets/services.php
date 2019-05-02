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
 * Magazine elementor Team Member section widget.
 *
 * @since 1.0
 */
class Magazine_Services extends Widget_Base {

	public function get_name() {
		return 'magazine-services';
	}

	public function get_title() {
		return __( 'Services', 'magazine' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'magazine-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'magazine' ),
			]
        );
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Services', 'magazine' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'magazine' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Regular Exercise', 'magazine' )
                    ],
                    [
                        'name'  => 'description',
                        'label' => __( 'Description', 'magazine' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'magazine' )
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'magazine' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        
                    ],
                    [
                        'name'  => 'service_icon',
                        'label' => __( 'Service Item Icon', 'magazine' ),
                        'type'  => Controls_Manager::ICON,
                        'options' => magazine_linearicon_list()
                        
                        
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End services content

        //------------------------------ Style Services ------------------------------
        $this->start_controls_section(
            'style_services', [
                'label' => __( 'Style Services', 'magazine' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_service_icon', [
                'label' => __( 'Service Icon Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-service .icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_icon_color', [
                'label' => __( 'Service Hover Icon Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover .icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_icon_bg_color', [
                'label' => __( 'Service Icon Background Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-service .icon span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_icon_bg_color', [
                'label' => __( 'Service Hover Icon Background Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover .icon span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicetitle', [
                'label' => __( 'Title Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_service_title',
                'selector'  => '{{WRAPPER}} .single-service h4',
            ]
        );
        $this->add_control(
            'color_service_desc', [
                'label' => __( 'Service Description Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_service_desc',
                'selector'  => '{{WRAPPER}} .single-service p',
            ]
        );

        $this->end_controls_section();
        
	}

	protected function render() {

    $settings = $this->get_settings();
    

    ?>
    <section class="service-area section-gap">
        <div class="container">
            <div class="row">
                <?php
                $services = $settings['services_content'];
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach( $services as $service ){ 
                        $service_title = ! empty( $service['label'] ) ? $service['label'] : '';
                        $title_url     = ! empty( $service['title_url']['url'] ) ? $service['title_url']['url'] : '';
                        $description   = ! empty( $service['description'] ) ? $service['description'] : '';
                        $icon          = ! empty( $service['service_icon'] ) ? $service['service_icon'] : '';
                        ?>
                        <div class="col-lg-4">
                            <div class="single-service d-flex flex-row">
                                <div class="icon">
                                    <?php echo '<span class="'. esc_html( $icon ) .'"></span>'; ?>
                                </div>
                                <div class="details">
                                    <?php 
                                    if( !empty( $title_url ) ){
                                        echo '<a href="'. esc_url( $title_url ) .'"><h4>'. esc_html( $service_title ) .'</h4></a>';
                                    }else{
                                        echo '<h4>'. esc_html( $service_title ) .'</h4>';
                                    }
                                    ?>
                                    <p><?php echo esc_html( $description ); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                
            </div>
        </div>
    </section>

    <?php

    }

	
}
