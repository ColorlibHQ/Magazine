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
class Magazine_Feedback extends Widget_Base {

	public function get_name() {
		return 'magazine-feedback';
	}

	public function get_title() {
		return __( 'Feedback', 'magazine' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'magazine-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'feedback_heading',
            [
                'label' => esc_html__( 'Feedback Section Heading', 'magazine' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Section Title', 'magazine' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Section Sub-title', 'magazine' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Feedback content ------------------------------
		$this->start_controls_section(
			'feedback_block',
			[
				'label' => esc_html__( 'Feedback', 'magazine' ),
			]
        );
        
        
		$this->add_control(
            'feedback_content', [
                'label' => esc_html__( 'Create Feedback Accordion', 'magazine' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ feedback_name }}}',
                'fields' => [
                    [
                        'name'  => 'feedback_name',
                        'label' => esc_html__( 'Feedback Name', 'magazine' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => esc_html__('Flex your muscle', 'magazine')
                    ],
                    [
                        'name'  => 'description',
                        'label' => esc_html__( 'Feedback Description', 'magazine' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('For many of us, our very first experience of learning about the celestial bodies begins when we saw our first full moon in the sky. It is truly a magnificent view even to the naked eye. If the night is clear, you can see amazing detail of the lunar surface just star gazing on in your back yard.', 'magazine')
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Feedback content

        // Section video settings ===============================
        $this->start_controls_section(
            'section_video',
            [
                'label' => esc_html__( 'Vedio Settings', 'magazine' ),
            ]
        );
        $this->add_control(
            'feedback_video_url', [
                'label' => esc_html__( 'YouTube Vedio URL', 'magazine' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true

            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'magazine' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .feedback-area .feedback-right',
            ]
        );
        $this->add_control(
            'paly_icon_select', [
                'label' => esc_html__( 'Vedio Play Icon Select', 'magazine' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'options'    => [
                    'image_icon' => 'Image Icon',
                    'font_icon'  => 'FontAwesome Icon'
                ],
                'default' => 'image_icon'

            ]
        );
        $this->add_control(
            'video_paly_icon', [
                'label' => esc_html__( 'Vedio Play Image Icon', 'magazine' ),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'paly_icon_select' => 'image_icon'
                ]

            ]
        );
        $this->add_control(
            'video_paly_fonticon', [
                'label' => esc_html__( 'Vedio Play Font Icon', 'magazine' ),
                'type'  => Controls_Manager::ICON,
                'label_block' => true,
                'condition' => [
                    'paly_icon_select' => 'font_icon'
                ]

            ]
        );

        $this->end_controls_section();
        // End Setion video settings================================

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
                    '{{WRAPPER}} .header-text h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .header-text h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .header-text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .header-text p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Accordion ------------------------------
        $this->start_controls_section(
            'style_accordion', [
                'label' => esc_html__( 'Style Accordin', 'magazine' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_accordion_title', [
                'label'     => esc_html__( 'Accordion Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .accordion-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_accordion_title_bg', [
                'label'     => esc_html__( 'Accordion Title Background Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9f9ff',
                'selectors' => [
                    '{{WRAPPER}} .accordion-item .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_accordion_active_title', [
                'label'     => esc_html__( 'Accordion Active Title Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .state-open .accordion-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_active_title_bg', [
                'label'     => esc_html__( 'Accordion Active Title Background Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .state-open .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_accordion_content', [
                'label'     => esc_html__( 'Accordion Content Color', 'magazine' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .accordion-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_accordion_content',
                'selector'  => '{{WRAPPER}} .accordion-content p',
            ]
        );

        $this->end_controls_section();

        

    

	}

	protected function render() {

    $settings = $this->get_settings();
    $accordions = $settings['feedback_content'];

    $sectionTitle = ! empty( $settings['sect_title'] ) ? $settings['sect_title'] : '';
    $subTitle = ! empty( $settings['sect_subtitle'] ) ? $settings['sect_subtitle'] : '';
    $videoUrl = ! empty( $settings['feedback_video_url']['url'] ) ? $settings['feedback_video_url']['url'] : '';
    $playImgIcon = ! empty( $settings['video_paly_icon']['url'] ) ? $settings['video_paly_icon']['url'] : '';
    ?>

        <section class="feedback-area section-gap" id="feedback">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 pb-50 header-text text-center">
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
                <div class="row feedback-contents justify-content-between align-items-center">
                    <div class="col-lg-6 feedback-left">
                        <div class="mn-accordion" id="accordion">
                            <?php
                            if( is_array( $accordions ) && count( $accordions ) > 0  ){
                                foreach( $accordions as $accordion ){ ?>
                                    <div class="accordion-item">
                                        <div class="accordion-heading">
                                            <h3><?php echo esc_html( $accordion['feedback_name'] ) ?></h3>
                                            <div class="icon">
                                                <i class="lnr lnr-chevron-right"></i>
                                            </div>
                                        </div>
                                        <div class="accordion-content">
                                            <p><?php echo esc_html( $accordion['description'] ) ?></p>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                            

                        </div>
                    </div>
                    <div class="col-lg-5 feedback-right relative d-flex justify-content-center align-items-center">
                        <div class="overlay overlay-bg"></div>
                        <a class="play-btn" href="<?php echo esc_url( $videoUrl ) ?>">
                            <?php
                            if( $settings['paly_icon_select'] == 'image_icon' ){
                                echo '<img src="'. esc_url( $playImgIcon ) .'" alt="'. esc_html__( 'Play Button', 'magazine' ) .'">';
                            }else{
                                echo '<i class="'. $settings['video_paly_fonticon'] .'"></i>';
                            }
                            ?>
                            
                            
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php

    }
    

}
