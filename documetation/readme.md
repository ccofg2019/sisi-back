## Auth

### Autenticar   
    url: http://104.131.99.239:5050/oauth/token
    method: POST
    header:
        Accept:application/json
    body:
    {
        "grant_type": "password",   
        "client_id": 2,   
        "client_secret": "g422Ugg1VaW9UcXaqrUKe6hJNb7tETtViB9AtY4X",   
        "username": user_email,   
        "password": user_password,   
        "scope": "*"
    }

## User

### Create User
    url: http://104.131.99.239:5050/api/mobile/users
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        "name": *"string",
        "cpf": *"string",
        "birthdate": *"Y-m-d",
        "gender": *"string",
        "skin_color": *"string",
        "cellphone": *"string",
        "phone": "string",
        "status": *"string",
        "email": *"string",
        "password": *"string"
    }
        
#### Validações:   
    'name'       => 'required|max:250',
    'cpf'        => 'required|max:14|unique:users,cpf',   
    'birthdate'  => 'required|date',   
    'gender'     => 'required|in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',   
    'skin_color' => 'required|in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',   
    'cellphone'  => 'required|string',   
    'phone'      => 'string',   
    'email'      => 'required|email|max:150|unique:users,email',   
    'password'   => 'required|max:32|string',   
    'status'     => 'required|in:ATIVO,BLOQUEADO,INATIVO'
    
### List Users
    url: http://104.131.99.239:5050/api/users
    method: GET
    header: 
        Accept:application/json
        Authorization:Bearer {{token}}
	
### Update User
    url: http://104.131.99.239:5050/api/users/{id}
    method: PUT
    header: 
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        "id": "integer"
        "name": *"string",
        "cpf": *"string",
        "birthdate": *"Y-m-d",
        "gender": *"string",
        "skin_color": *"string",
        "cellphone": *"string",
        "phone": "string",
        "status": *"string",
        "email": *"string",
        "password": *"string"
    }
        
#### Validações:   
    'id'	     => 'required|integer',
    'name'       => 'max:250',  
    'cpf'        => 'max:14|unique:users,cpf',   
    'birthdate'  => 'date',   
    'gender'     => 'in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',   
    'skin_color' => 'in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',   
    'cellphone'  => 'string',   
    'phone'      => 'string',   
    'email'      => 'email|max:150|unique:users,email',   
    'password'   => 'max:32|string',   
    'status'     => 'in:ATIVO,BLOQUEADO,INATIVO'

### My Informations
    url: http://104.131.99.239:5050/api/user/myInformations
        method: GET
        header: 
            Accept:application/json
            Authorization:Bearer {{token}}

## IrregularityReport

### Create IrregularityReport

    url: http://104.131.99.239:5050/api/irregularity-reports
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        "title": "string",
        "story": "string",
        "coordinates": "latitude,longitude",
        "irregularity_type_id": "integer",
        "agent_id": "integer",
        "zone_id": "integer",
        "status": "string"
    }

#### Validações:
    'title'                 => 'required',
    'story'                 => 'required',
    'coordinates'           => 'required',
    'irregularity_type_id'  => 'required|integer',
    'agent_id'              => 'integer',
    'zone_id'               => 'required|integer',
    'status'                => 'in:NOVO,EM INVESTIGACAO,CONCLUIDO,ARQUIVADA'

### MyList IrregularityReport

    url: http://104.131.99.239:5050/api/irregularity-reports/myList
    method: GET
    header: 
        Authorization:Bearer {{token}}

### List All IrregularityReport Of a Year

    url: http://104.131.99.239:5050/api/irregularity-reports/getAllOfTheYear?{year}&{month}&{idIrregularityType}
    method: GET
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}

#### Validações:

    'year': 'integer',
    'month': 'integer',
    'idIrregularityType': 'integer'

### Count All Irregularity Of a Interval Date Of Each Type

    url: http://104.131.99.239:5050/api/irregularity-reports/countIrregularityOfEachType?{date_start}&{date_end}
    method: GET
    header: 
        Authorization:Bearer {{token}}

#### Validações:

    'date_start' => 'required|date_format:Y-m-d',
    'date_end'   => 'required|date_format:Y-m-d'

### Count Irregularity Type Of One Type
    url: http://104.131.99.239:5050/api/irregularity-reports/countIrregularityOfOneType?{irregularity_id}&{date_start}&{date_end}
    method: GET
    header: 
        Authorization:Bearer {{token}}

#### Validações:

    'irregularity_id'   => 'required|numeric',
    'date_start'        => 'required|date_format:Y-m-d',
    'date_end'          => 'required|date_format:Y-m-d'    

## IrregularityType

### List IrregularityType

    url: http://104.131.99.239:5050/api/irregularity-types
    method: GET
    header: 
        Authorization:Bearer {{token}}

## OccurrenceReport

### Create OccurrenceReport

    url: http://104.131.99.239:5050/api/occurrence-reports
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        "title": "string",
        "story": "string",
        "occurrence_date": "date",
        "occurrence_time": "time"
        "coordinates": "latitude,longitude",
        "occurrence_type_id": "integer",
        "agent_id": "integer",
        "zone_id": "integer",
        "status": "string"
    }
#### Validações:

    'title'                 => 'required',
    'story'                 => 'required',
    'occurrence_date'       => 'required|date',
	'occurrence_time'       => 'required|time',
    'coordinates'           => 'required',
    'occurrence_type_id'    => 'required|integer',
    'agent_id'              => 'integer',
    'zone_id'               => 'required|integer',
    'status'                => 'in:NOVO,EM INVESTIGACAO,CONCLUIDO,ARQUIVADA'

### MyList OccurrenceReport

    url: http://104.131.99.239:5050/api/occurrence-reports/myList
    method: GET
    header: 
        Authorization:Bearer {{token}}

### List All OccurrenceReport Of a Year

    url: http://104.131.99.239:5050/api/occurrence-reports/getAllOfTheYear?{year}&{month}&{idOccurrenceType}
    method: GET
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
#### Validações:

    'year': 'integer',
    'month': 'integer',
    'idOccurrenceType': 'integer'

### List All OccurrenceReport Of a Year Ago

    url: http://104.131.99.239:5050/api/occurrence-reports/listOccurrenceOfAYearAgo
    method: GET
    header: 
        Authorization:Bearer {{token}}

### Count All Occurrence Of a Interval Date Of Each Type

    url: http://104.131.99.239:5050/api/occurrence-reports/countOccurrenceOfEachType?{date_start}&{date_end}
    method: GET
    header: 
        Authorization:Bearer {{token}}

#### Validações:

    'date_start': 'date',
    'date_end': 'date',

#### Validações:

    'date_start' => 'required|date_format:Y-m-d',
    'date_end'   => 'required|date_format:Y-m-d'

## OccurrenceType

### List OccurrenceType

    url: http://104.131.99.239:5050/api/occurrence-types
    method: GET
    header: 
        Authorization:Bearer {{token}}

## Emergency

### Create Emergency

    url: http://104.131.99.239:5050/api/emergency
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        'latitude': 'numeric',
        'longitude': 'numeric'
    }
### Validações:

    'latitude':  'required|numeric|between:-99.99999999, 99.99999999',
    'longitude': 'required|numeric|between:-999.99999999, 999.99999999'

### Create a New Position for an Existing Emergency

    url: http://104.131.99.239:5050/api/emergency/insertNewPosition
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        'emergency_id': 'integer'
        'latitude': 'numeric',
        'longitude': 'numeric'
    }
### Validações:

    'emergency_id' => 'required|integer', 
    'latitude'     => 'required|numeric|between:-99.99999999, 99.99999999',
    'longitude'    => 'required|numeric|between:-999.99999999, 999.99999999'

### Alter Status Emergency

    url: http://104.131.99.239:5050/api/emergency/changeStatus
    method: POST
    header:        
        Accept:application/json
        Authorization:Bearer {{token}}
    body:
    {
        'emergency_id': 'integer',
        'status': 'string'      
    }
### Validações:

    'emergency_id': 'required|integer',
    'status': 'required|in:ALERTA,PERIGO,FINALIZADO,ATENDENDO'      

### List Emergencies Of Attention

    url: http://104.131.99.239:5050/api/emergency/listEmergenciesAttention
    method: GET
    header: 
        Authorization:Bearer {{token}}