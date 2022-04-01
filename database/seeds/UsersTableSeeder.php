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
                'subscribe_at' => '2022-02-21',
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
                'title'      => 'Scaffolding',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'Painting',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        $type_of_trade_acts = [
            [
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (Incident Reporting) Regulations',
                'file'       => 'Workplace Safety & Health (Incident Reporting) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (First Aid) Regulations',
                'file'       => 'Workplace Safety & Health (First Aid) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (Scaffold) Regulations',
                'file'       => 'Workplace Safety & Health (Scaffolds) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (Work at Height) Regulations',
                'file'       => 'Workplace Safety and Health (Work at Heights) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (General Provision) Regulations',
                'file'       => 'Workplace Safety & Health (General Provisions) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (Incident Reporting) Regulations',
                'file'       => 'Workplace Safety & Health (Incident Reporting) Regulations.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'      => 'WSH (First Aid) Regulations',
                'file'       => 'Workplace Safety & Health (First Aid) Regulations 2006.pdf',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        $toi_tota = [
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
            
        ];

        $subtitletitle_of_laws = [
            [
                'type_of_trade_act_id'  => '1',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '2',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '3',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '4',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '5',
                'title'  => 'Arrangement of Regulations <br> Paragraph',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '6',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '7',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '8',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '9',
                'title'  => 'Arrangement of Regulations <br> PART I PRELIMINARY <br> Regulation',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'type_of_trade_act_id'  => '10',
                'title'  => 'Arrangement of Regulations <br> Paragraph',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $title_of_laws = [
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
