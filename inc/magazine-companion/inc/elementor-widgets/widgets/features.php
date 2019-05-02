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
class Magazine_Features extends Widget_Base {

	public function get_name() {
		return 'magazine-features';
	}

	public function get_title() {
		return __( 'Features', 'magazine' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'magazine-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Features Section Heading', 'magazine' ),
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
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'magazine' ),
			]
        );
        $this->add_control(
            'featured_img', [
                'label'     => __( 'Feature Image', 'magazine' ),
                'type'      => Controls_Manager::MEDIA,
                
            ]
        );
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'magazine' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'magazine' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Smart Security', 'magazine' )
                    ],
                    [
                        'name'  => 'description',
                        'label' => __( 'Description', 'magazine' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => esc_html__( 'inappropriate behavior is often laughed off as boys will be boys, women face higher conduct women face higher conduct.', 'magazine' )
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End features content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'magazine' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_fsec_title',
                'selector'  => '{{WRAPPER}} .section-title h1',
            ]
        );
        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_fsec_desc',
                'selector'  => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'magazine' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'magazine' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_feature_title',
                'selector'  => '{{WRAPPER}} .single-feature h4',
            ]
        );
        $this->add_control(
            'color_feature_desc', [
                'label' => __( 'Feature Description Color', 'magazine' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_feature_desc',
                'selector'  => '{{WRAPPER}} .single-feature p',
            ]
        );

        


        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();
    $f_image = ! empty( $settings['featured_img']['url'] ) ? $settings['featured_img']['url'] : '';
    ?>
        <section class="feature-area section-gap">
            <div class="container">
                <?php
                    // Section Heading
                    magazine_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>  						
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 feature-left">
                        <?php if( $f_image ){
                            echo '<img class="img-fluid" src="'. esc_url( $f_image ) .'" alt="'.esc_html__( 'feature image', 'magazine' ).'">';
                        }?>
                    </div>
                    <div class="col-lg-6 feature-right">
                    <?php
                    if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                        foreach( $settings['features_content'] as $feature ):
                            ?>
                            <div class="single-feature">
                                <h4><?php echo esc_html( $feature['label'] ); ?></h4>
                                <p><?php echo esc_html( $feature['description'] ); ?></p>
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

	
}
