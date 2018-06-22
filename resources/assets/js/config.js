/*
	Defines the API route we are using.
*/
let api_url = '';

switch(process.env.NODE_ENV){
	case 'development':
		api_url = 'https://localhost:8000/api/v1';
		break;
	case 'production':
		api_url = 'https://production.com/api/v1';
		break;
}

export const URL_CONFIG = {
	API_URL: api_url,
}