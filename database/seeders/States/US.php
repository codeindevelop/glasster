<?php

namespace Database\Seeders\States;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class US extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $us_states = array(
            array('id' => '1', 'country_id' => '226', 'state_name' => 'Alaska', 'iso_code' => 'AK', 'active' => '1'),
            array('id' => '2', 'country_id' => '226', 'state_name' => 'Alabama', 'iso_code' => 'AL', 'active' => '1'),
            array('id' => '3', 'country_id' => '226', 'state_name' => 'American Samoa', 'iso_code' => 'AS', 'active' => '1'),
            array('id' => '4', 'country_id' => '226', 'state_name' => 'Arizona', 'iso_code' => 'AZ', 'active' => '1'),
            array('id' => '5', 'country_id' => '226', 'state_name' => 'Arkansas', 'iso_code' => 'AR', 'active' => '1'),
            array('id' => '6', 'country_id' => '226', 'state_name' => 'California', 'iso_code' => 'CA', 'active' => '1'),
            array('id' => '7', 'country_id' => '226', 'state_name' => 'Colorado', 'iso_code' => 'CO', 'active' => '1'),
            array('id' => '8', 'country_id' => '226', 'state_name' => 'Connecticut', 'iso_code' => 'CT', 'active' => '1'),
            array('id' => '9', 'country_id' => '226', 'state_name' => 'Delaware', 'iso_code' => 'DE', 'active' => '1'),
            array('id' => '10', 'country_id' => '226', 'state_name' => 'District of Columbia', 'iso_code' => 'DC', 'active' => '1'),
            array('id' => '11', 'country_id' => '226', 'state_name' => 'Federated States of Micronesia', 'iso_code' => 'FM', 'active' => '1'),
            array('id' => '12', 'country_id' => '226', 'state_name' => 'Florida', 'iso_code' => 'FL', 'active' => '1'),
            array('id' => '13', 'country_id' => '226', 'state_name' => 'Georgia', 'iso_code' => 'GA', 'active' => '1'),
            array('id' => '14', 'country_id' => '226', 'state_name' => 'Guam', 'iso_code' => 'GU', 'active' => '1'),
            array('id' => '15', 'country_id' => '226', 'state_name' => 'Hawaii', 'iso_code' => 'HI', 'active' => '1'),
            array('id' => '16', 'country_id' => '226', 'state_name' => 'Idaho', 'iso_code' => 'ID', 'active' => '1'),
            array('id' => '17', 'country_id' => '226', 'state_name' => 'Illinois', 'iso_code' => 'IL', 'active' => '1'),
            array('id' => '18', 'country_id' => '226', 'state_name' => 'Indiana', 'iso_code' => 'IN', 'active' => '1'),
            array('id' => '19', 'country_id' => '226', 'state_name' => 'Iowa', 'iso_code' => 'IA', 'active' => '1'),
            array('id' => '20', 'country_id' => '226', 'state_name' => 'Kansas', 'iso_code' => 'KS', 'active' => '1'),
            array('id' => '21', 'country_id' => '226', 'state_name' => 'Kentucky', 'iso_code' => 'KY', 'active' => '1'),
            array('id' => '22', 'country_id' => '226', 'state_name' => 'Louisiana', 'iso_code' => 'LA', 'active' => '1'),
            array('id' => '23', 'country_id' => '226', 'state_name' => 'Maine', 'iso_code' => 'ME', 'active' => '1'),
            array('id' => '24', 'country_id' => '226', 'state_name' => 'Marshall Islands', 'iso_code' => 'MH', 'active' => '1'),
            array('id' => '25', 'country_id' => '226', 'state_name' => 'Maryland', 'iso_code' => 'MD', 'active' => '1'),
            array('id' => '26', 'country_id' => '226', 'state_name' => 'Massachusetts', 'iso_code' => 'MA', 'active' => '1'),
            array('id' => '27', 'country_id' => '226', 'state_name' => 'Michigan', 'iso_code' => 'MI', 'active' => '1'),
            array('id' => '28', 'country_id' => '226', 'state_name' => 'Minnesota', 'iso_code' => 'MN', 'active' => '1'),
            array('id' => '29', 'country_id' => '226', 'state_name' => 'Mississippi', 'iso_code' => 'MS', 'active' => '1'),
            array('id' => '30', 'country_id' => '226', 'state_name' => 'Missouri', 'iso_code' => 'MO', 'active' => '1'),
            array('id' => '31', 'country_id' => '226', 'state_name' => 'Montana', 'iso_code' => 'MT', 'active' => '1'),
            array('id' => '32', 'country_id' => '226', 'state_name' => 'Nebraska', 'iso_code' => 'NE', 'active' => '1'),
            array('id' => '33', 'country_id' => '226', 'state_name' => 'Nevada', 'iso_code' => 'NV', 'active' => '1'),
            array('id' => '34', 'country_id' => '226', 'state_name' => 'New Hampshire', 'iso_code' => 'NH', 'active' => '1'),
            array('id' => '35', 'country_id' => '226', 'state_name' => 'New Jersey', 'iso_code' => 'NJ', 'active' => '1'),
            array('id' => '36', 'country_id' => '226', 'state_name' => 'New Mexico', 'iso_code' => 'NM', 'active' => '1'),
            array('id' => '37', 'country_id' => '226', 'state_name' => 'New York', 'iso_code' => 'NY', 'active' => '1'),
            array('id' => '38', 'country_id' => '226', 'state_name' => 'North Carolina', 'iso_code' => 'NC', 'active' => '1'),
            array('id' => '39', 'country_id' => '226', 'state_name' => 'North Dakota', 'iso_code' => 'ND', 'active' => '1'),
            array('id' => '40', 'country_id' => '226', 'state_name' => 'Northern Mariana Islands', 'iso_code' => 'MP', 'active' => '1'),
            array('id' => '41', 'country_id' => '226', 'state_name' => 'Ohio', 'iso_code' => 'OH', 'active' => '1'),
            array('id' => '42', 'country_id' => '226', 'state_name' => 'Oklahoma', 'iso_code' => 'OK', 'active' => '1'),
            array('id' => '43', 'country_id' => '226', 'state_name' => 'Oregon', 'iso_code' => 'OR', 'active' => '1'),
            array('id' => '44', 'country_id' => '226', 'state_name' => 'Palau', 'iso_code' => 'PW', 'active' => '1'),
            array('id' => '45', 'country_id' => '226', 'state_name' => 'Pennsylvania', 'iso_code' => 'PA', 'active' => '1'),
            array('id' => '46', 'country_id' => '226', 'state_name' => 'Puerto Rico', 'iso_code' => 'PR', 'active' => '1'),
            array('id' => '47', 'country_id' => '226', 'state_name' => 'Rhode Island', 'iso_code' => 'RI', 'active' => '1'),
            array('id' => '48', 'country_id' => '226', 'state_name' => 'South Carolina', 'iso_code' => 'SC', 'active' => '1'),
            array('id' => '49', 'country_id' => '226', 'state_name' => 'South Dakota', 'iso_code' => 'SD', 'active' => '1'),
            array('id' => '50', 'country_id' => '226', 'state_name' => 'Tennessee', 'iso_code' => 'TN', 'active' => '1'),
            array('id' => '51', 'country_id' => '226', 'state_name' => 'Texas', 'iso_code' => 'TX', 'active' => '1'),
            array('id' => '52', 'country_id' => '226', 'state_name' => 'Utah', 'iso_code' => 'UT', 'active' => '1'),
            array('id' => '53', 'country_id' => '226', 'state_name' => 'Vermont', 'iso_code' => 'VT', 'active' => '1'),
            array('id' => '54', 'country_id' => '226', 'state_name' => 'Virgin Islands', 'iso_code' => 'VI', 'active' => '1'),
            array('id' => '55', 'country_id' => '226', 'state_name' => 'Virginia', 'iso_code' => 'VA', 'active' => '1'),
            array('id' => '56', 'country_id' => '226', 'state_name' => 'Washington', 'iso_code' => 'WA', 'active' => '1'),
            array('id' => '57', 'country_id' => '226', 'state_name' => 'West Virginia', 'iso_code' => 'WV', 'active' => '1'),
            array('id' => '58', 'country_id' => '226', 'state_name' => 'Wisconsin', 'iso_code' => 'WI', 'active' => '1'),
            array('id' => '59', 'country_id' => '226', 'state_name' => 'Wyoming', 'iso_code' => 'WY', 'active' => '1'),
            array('id' => '60', 'country_id' => '226', 'state_name' => 'Armed Forces Africa', 'iso_code' => 'AE', 'active' => '1'),
            array('id' => '61', 'country_id' => '226', 'state_name' => 'Armed Forces Americas (except Canada)', 'iso_code' => 'AA', 'active' => '1'),
            array('id' => '62', 'country_id' => '226', 'state_name' => 'Armed Forces Canada', 'iso_code' => 'AE', 'active' => '1'),
            array('id' => '63', 'country_id' => '226', 'state_name' => 'Armed Forces Europe', 'iso_code' => 'AE', 'active' => '1'),
            array('id' => '64', 'country_id' => '226', 'state_name' => 'Armed Forces Middle East', 'iso_code' => 'AE', 'active' => '1'),
            array('id' => '65', 'country_id' => '226', 'state_name' => 'Armed Forces Pacific', 'iso_code' => 'AP', 'active' => '1'),
           
            
           
        );

        

        DB::table('states')->insert($us_states);
    }
}




