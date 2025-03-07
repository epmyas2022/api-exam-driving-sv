<?php
namespace App\Enums;
use ReflectionClass;

enum Pais: string {
    case AFGHANISTAN = 'Afghanistan';
    case ALAND_ISLANDS = 'Aland Islands';
    case ALBANIA = 'Albania';
    case ARGENTINA = 'Argentina';
    case ARMENIA = 'Armenia';
    case AUSTRALIA = 'Australia';
    case AZERBAIJAN = 'Azerbaijan';
    case BANGLADESH = 'Bangladesh';
    case BARBADOS = 'Barbados';
    case BELARUS = 'Belarus';
    case BOLIVIA = 'Bolivia';
    case BOSNIA_AND_HERZEGOVINA = 'Bosnia and Herzegovina';
    case BRAZIL = 'Brazil';
    case BULGARIA = 'Bulgaria';
    case BURKINA_FASO = 'Burkina Faso';
    case CAMBODIA = 'Cambodia';
    case CAMEROON = 'Cameroon';
    case CANADA = 'Canada';
    case CENTRAL_AFRICAN_REPUBLIC = 'Central African Republic';
    case CHAD = 'Chad';
    case CHILE = 'Chile';
    case CHINA = 'China';
    case COLOMBIA = 'Colombia';
    case COSTA_RICA = 'Costa Rica';
    case CROATIA = 'Croatia';
    case CUBA = 'Cuba';
    case CYPRUS = 'Cyprus';
    case CZECH_REPUBLIC = 'Czech Republic';
    case DEMOCRATIC_REPUBLIC_OF_THE_CONGO = 'Democratic Republic of the Congo';
    case DENMARK = 'Denmark';
    case DOMINICAN_REPUBLIC = 'Dominican Republic';
    case ECUADOR = 'Ecuador';
    case EGYPT = 'Egypt';
    case EL_SALVADOR = 'El Salvador';
    case FAROE_ISLANDS = 'Faroe Islands';
    case FINLAND = 'Finland';
    case FRANCE = 'France';
    case FRENCH_POLYNESIA = 'French Polynesia';
    case GABON = 'Gabon';
    case GAMBIA = 'Gambia';
    case GEORGIA = 'Georgia';
    case GERMANY = 'Germany';
    case GREECE = 'Greece';
    case GUATEMALA = 'Guatemala';
    case HAITI = 'Haiti';
    case HONDURAS = 'Honduras';
    case HUNGARY = 'Hungary';
    case INDONESIA = 'Indonesia';
    case IRAN = 'Iran';
    case IRAQ = 'Iraq';
    case IRELAND = 'Ireland';
    case ISRAEL = 'Israel';
    case ITALY = 'Italy';
    case IVORY_COAST = 'Ivory Coast';
    case JAMAICA = 'Jamaica';
    case JAPAN = 'Japan';
    case JORDAN = 'Jordan';
    case KAZAKHSTAN = 'Kazakhstan';
    case KENYA = 'Kenya';
    case KOSOVO = 'Kosovo';
    case LAOS = 'Laos';
    case LATVIA = 'Latvia';
    case LEBANON = 'Lebanon';
    case LIBYA = 'Libya';
    case LITHUANIA = 'Lithuania';
    case MACEDONIA = 'Macedonia';
    case MADAGASCAR = 'Madagascar';
    case MALAYSIA = 'Malaysia';
    case MALI = 'Mali';
    case MALTA = 'Malta';
    case MAURITIUS = 'Mauritius';
    case MEXICO = 'Mexico';
    case MOLDOVA = 'Moldova';
    case MONGOLIA = 'Mongolia';
    case MOROCCO = 'Morocco';
    case NETHERLANDS = 'Netherlands';
    case NICARAGUA = 'Nicaragua';
    case NIGER = 'Niger';
    case NIGERIA = 'Nigeria';
    case NORTH_KOREA = 'North Korea';
    case NORWAY = 'Norway';
    case PALESTINIAN_TERRITORY = 'Palestinian Territory';
    case PANAMA = 'Panama';
    case PARAGUAY = 'Paraguay';
    case PERU = 'Peru';
    case PHILIPPINES = 'Philippines';
    case POLAND = 'Poland';
    case PORTUGAL = 'Portugal';
    case REUNION = 'Reunion';
    case RUSSIA = 'Russia';
    case SAINT_LUCIA = 'Saint Lucia';
    case SAUDI_ARABIA = 'Saudi Arabia';
    case SENEGAL = 'Senegal';
    case SERBIA = 'Serbia';
    case SLOVENIA = 'Slovenia';
    case SOUTH_AFRICA = 'South Africa';
    case SOUTH_KOREA = 'South Korea';
    case SOUTH_SUDAN = 'South Sudan';
    case SPAIN = 'Spain';
    case SRI_LANKA = 'Sri Lanka';
    case SUDAN = 'Sudan';
    case SWAZILAND = 'Swaziland';
    case SWEDEN = 'Sweden';
    case SYRIA = 'Syria';
    case TAIWAN = 'Taiwan';
    case TAJIKISTAN = 'Tajikistan';
    case TANZANIA = 'Tanzania';
    case THAILAND = 'Thailand';
    case TOGO = 'Togo';
    case TUNISIA = 'Tunisia';
    case TURKEY = 'Turkey';
    case TURKMENISTAN = 'Turkmenistan';
    case UGANDA = 'Uganda';
    case UKRAINE = 'Ukraine';
    case UNITED_STATES = 'United States';
    case URUGUAY = 'Uruguay';
    case UZBEKISTAN = 'Uzbekistan';
    case VENEZUELA = 'Venezuela';
    case VIETNAM = 'Vietnam';
    case YEMEN = 'Yemen';
    case ZAMBIA = 'Zambia';
    case ZIMBABWE = 'Zimbabwe';


    public static function getAll(): array
    {
        $reflectionClass = new ReflectionClass(self::class);

        return $reflectionClass->getConstants();
    }
}