<?php

use App\Models\User;
use App\Models\Client;
use App\Models\TypeOfIndustry;
use App\Models\TypeOfTradeAct;
use App\Models\TOI_TOTA;
use App\Models\TitleOfLaw;
use App\Models\SubtitleOfLaw;
use App\Models\Client_TOI;


use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            [
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'isComplete'     => 1,
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'subscribe_at' => '2099-01-01',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'email'          => 'client@client.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'isComplete' => 1,
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'subscribe_at' => '2022-12-01',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];
        $clients = [
            [
                'user_id'               => '2',
                'name'                  => 'Test Client',
                'address'               => 'Antipolo City',
                'contact_number'        => '09111111111',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        $type_of_industries = [
            [ 
                'id'         => '1',
                'title'      => 'Scaffolding',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '2',
                'title'      => 'Painting',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [ 
                'id'         => '3',
                'title'      => 'Tunnelling',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '4',
                'title'      => 'Excavation',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '5',
                'title'      => 'Formwork',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $type_of_trade_acts = [
            //Scaffolding
            [
                'id'         => '1',
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '2',
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '3',
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '4',
                'title'      => 'WSH (Incident Reporting) Regulations',
                'file'       => 'Workplace Safety & Health (Incident Reporting) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '5',
                'title'      => 'WSH (First Aid) Regulations',
                'file'       => 'Workplace Safety & Health (First Aid) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Painting
            [
                'id'         => '6',
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '7',
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '8',
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '9',
                'title'      => 'WSH (Incident Reporting) Regulations',
                'file'       => 'Workplace Safety & Health (Incident Reporting) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '10',
                'title'      => 'WSH (First Aid) Regulations',
                'file'       => 'Workplace Safety & Health (First Aid) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Tunnelling
            [
                'id'         => '11',
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '12',
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '13',
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '14',
                'title'      => 'WSH (Incident Reporting) Regulations',
                'file'       => 'Workplace Safety & Health (Incident Reporting) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '15',
                'title'      => 'WSH (First Aid) Regulations',
                'file'       => 'Workplace Safety & Health (First Aid) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Excavation
            [
                'id'         => '16',
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '17',
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '18',
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Formwork
            [
                'id'         => '19',
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '20',
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'         => '21',
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

        ];
        $toi_tota = [
            //Scaffolding
            [
                'type_of_industry_id'  => '1',
                'type_of_trade_act_id'  => '1',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '1',
                'type_of_trade_act_id'  => '2',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '1',
                'type_of_trade_act_id'  => '3',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '1',
                'type_of_trade_act_id'  => '4',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '1',
                'type_of_trade_act_id'  => '5',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Painting
            [
                'type_of_industry_id'  => '2',
                'type_of_trade_act_id'  => '6',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '2',
                'type_of_trade_act_id'  => '7',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '2',
                'type_of_trade_act_id'  => '8',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '2',
                'type_of_trade_act_id'  => '9',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '2',
                'type_of_trade_act_id'  => '10',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Tunnelling
            [
                'type_of_industry_id'  => '3',
                'type_of_trade_act_id'  => '11',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '3',
                'type_of_trade_act_id'  => '12',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '3',
                'type_of_trade_act_id'  => '13',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '3',
                'type_of_trade_act_id'  => '14',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '3',
                'type_of_trade_act_id'  => '15',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Excavation
            [
                'type_of_industry_id'  => '4',
                'type_of_trade_act_id'  => '16',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '4',
                'type_of_trade_act_id'  => '17',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '4',
                'type_of_trade_act_id'  => '18',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Formwork
            [
                'type_of_industry_id'  => '5',
                'type_of_trade_act_id'  => '19',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '5',
                'type_of_trade_act_id'  => '20',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_industry_id'  => '5',
                'type_of_trade_act_id'  => '21',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        $subtitletitle_of_laws = [
            //Scaffolding
            [
                'id'    => '1',
                'type_of_trade_act_id'  => '1',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '2',
                'type_of_trade_act_id'  => '2',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '3',
                'type_of_trade_act_id'  => '3',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '4',
                'type_of_trade_act_id'  => '4',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '5',
                'type_of_trade_act_id'  => '5',
                'title'  => 'Arrangement of Regulations <br> Paragraph',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Painting
            [
                'id'    => '6',
                'type_of_trade_act_id'  => '6',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '7',
                'type_of_trade_act_id'  => '7',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '8',
                'type_of_trade_act_id'  => '8',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '9',
                'type_of_trade_act_id'  => '9',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '10',
                'type_of_trade_act_id'  => '10',
                'title'  => 'Arrangement of Regulations <br> Paragraph',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Tunnelling
            [
                'id'    => '11',
                'type_of_trade_act_id'  => '11',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '12',
                'type_of_trade_act_id'  => '12',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '13',
                'type_of_trade_act_id'  => '13',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '14',
                'type_of_trade_act_id'  => '14',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '15',
                'type_of_trade_act_id'  => '15',
                'title'  => 'Arrangement of Regulations <br> Paragraph',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Excavation
            [
                'id'    => '16',
                'type_of_trade_act_id'  => '16',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '17',
                'type_of_trade_act_id'  => '17',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '18',
                'type_of_trade_act_id'  => '18',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Formwork
            [
                'id'    => '19',
                'type_of_trade_act_id'  => '19',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '20',
                'type_of_trade_act_id'  => '20',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'    => '21',
                'type_of_trade_act_id'  => '21',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $title_of_laws = [
            //Scaffolding
            //WSH (SCAFFOLD) REGULATIONS
            [
                'type_of_trade_act_id'  => '1',
                'subtitle_of_law_id'    => '1',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '1',
                'subtitle_of_law_id'    => '1',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '1',
                'subtitle_of_law_id'    => '1',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Work at Height) Regulations
            [
                'type_of_trade_act_id'  => '2',
                'subtitle_of_law_id'    => '2',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '2',
                'subtitle_of_law_id'    => '2',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '2',
                'subtitle_of_law_id'    => '2',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (General Provision) Regulations
            [
                'type_of_trade_act_id'  => '3',
                'subtitle_of_law_id'    => '3',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '3',
                'subtitle_of_law_id'    => '3',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Incident Reporting) Regulations
            [
                'type_of_trade_act_id'  => '4',
                'subtitle_of_law_id'    => '4',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '4',
                'subtitle_of_law_id'    => '4',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '4',
                'subtitle_of_law_id'    => '4',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (First Aid) Regulations
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Provision of first-aid boxes',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'First-aiders',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'First-aid room',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'First-aid for exposure to toxic or corrosive substances',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Offences',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'subtitle_of_law_id'    => '5',
                'title'  => 'Revocation',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Painting
            //WSH (SCAFFOLD) REGULATIONS
            [
                'type_of_trade_act_id'  => '6',
                'subtitle_of_law_id'    => '6',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '6',
                'subtitle_of_law_id'    => '6',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '6',
                'subtitle_of_law_id'    => '6',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Work at Height) Regulations
            [
                'type_of_trade_act_id'  => '7',
                'subtitle_of_law_id'    => '7',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '7',
                'subtitle_of_law_id'    => '7',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '7',
                'subtitle_of_law_id'    => '7',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (General Provision) Regulations
            [
                'type_of_trade_act_id'  => '8',
                'subtitle_of_law_id'    => '8',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '8',
                'subtitle_of_law_id'    => '8',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Incident Reporting) Regulations
            [
                'type_of_trade_act_id'  => '9',
                'subtitle_of_law_id'    => '9',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '9',
                'subtitle_of_law_id'    => '9',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '9',
                'subtitle_of_law_id'    => '9',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (First Aid) Regulations
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Provision of first-aid boxes',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'First-aiders',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'First-aid room',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'First-aid for exposure to toxic or corrosive substances',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Offences',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'subtitle_of_law_id'    => '10',
                'title'  => 'Revocation',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //Tunnelling
            //WSH (SCAFFOLD) REGULATIONS
            [
                'type_of_trade_act_id'  => '11',
                'subtitle_of_law_id'    => '11',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '11',
                'subtitle_of_law_id'    => '11',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '11',
                'subtitle_of_law_id'    => '11',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Work at Height) Regulations
            [
                'type_of_trade_act_id'  => '12',
                'subtitle_of_law_id'    => '12',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '12',
                'subtitle_of_law_id'    => '12',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '12',
                'subtitle_of_law_id'    => '12',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (General Provision) Regulations
            [
                'type_of_trade_act_id'  => '13',
                'subtitle_of_law_id'    => '13',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '13',
                'subtitle_of_law_id'    => '13',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Incident Reporting) Regulations
            [
                'type_of_trade_act_id'  => '14',
                'subtitle_of_law_id'    => '14',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '14',
                'subtitle_of_law_id'    => '14',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '14',
                'subtitle_of_law_id'    => '14',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (First Aid) Regulations
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Provision of first-aid boxes',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'First-aiders',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'First-aid room',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'First-aid for exposure to toxic or corrosive substances',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Offences',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '15',
                'subtitle_of_law_id'    => '15',
                'title'  => 'Revocation',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //Excavation
            //WSH (SCAFFOLD) REGULATIONS
            [
                'type_of_trade_act_id'  => '16',
                'subtitle_of_law_id'    => '16',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '16',
                'subtitle_of_law_id'    => '16',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '16',
                'subtitle_of_law_id'    => '16',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Work at Height) Regulations
            [
                'type_of_trade_act_id'  => '17',
                'subtitle_of_law_id'    => '17',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '17',
                'subtitle_of_law_id'    => '17',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '17',
                'subtitle_of_law_id'    => '17',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (General Provision) Regulations
            [
                'type_of_trade_act_id'  => '18',
                'subtitle_of_law_id'    => '18',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '18',
                'subtitle_of_law_id'    => '18',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],

            //Formwork
            //WSH (SCAFFOLD) REGULATIONS
            [
                'type_of_trade_act_id'  => '19',
                'subtitle_of_law_id'    => '19',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '19',
                'subtitle_of_law_id'    => '19',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '19',
                'subtitle_of_law_id'    => '19',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (Work at Height) Regulations
            [
                'type_of_trade_act_id'  => '20',
                'subtitle_of_law_id'    => '20',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '20',
                'subtitle_of_law_id'    => '20',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '20',
                'subtitle_of_law_id'    => '20',
                'title'  => 'Application',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            //WSH (General Provision) Regulations
            [
                'type_of_trade_act_id'  => '21',
                'subtitle_of_law_id'    => '21',
                'title'  => 'Citation and commencement',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '21',
                'subtitle_of_law_id'    => '21',
                'title'  => 'Definitions',
                

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $client_tois = [
            [
                'client_id'            => '1',
                'type_of_industry_id'  => '1',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'client_id'            => '1',
                'type_of_industry_id'  => '2',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'client_id'            => '1',
                'type_of_industry_id'  => '3',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'client_id'            => '1',
                'type_of_industry_id'  => '4',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'client_id'            => '1',
                'type_of_industry_id'  => '5',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        User::insert($accounts);
        Client::insert($clients);
        TypeOfIndustry::insert($type_of_industries);
        TypeOfTradeAct::insert($type_of_trade_acts);
        TOI_TOTA::insert($toi_tota);
        TitleOfLaw::insert($title_of_laws);
        SubtitleOfLaw::insert($subtitletitle_of_laws);
        Client_TOI::insert($client_tois);
    }
}
