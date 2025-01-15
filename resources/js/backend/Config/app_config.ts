type app_config_type = {
    api_host: string;
    api_version: string;
    image_host: string;
    app_env: string;
};

const APP_ENV = "local";
const LOCAL_URL = "http://127.0.0.1:8000";
const PRODUCTION_URL = "https://planning.techparkit.org";

const app_env = APP_ENV;

const getHost = (env: string): string => {
    return env === APP_ENV ? LOCAL_URL : PRODUCTION_URL;
};

let app_config: app_config_type = {
    api_host: getHost(app_env),
    image_host: getHost(app_env),
    api_version: "api/v1",
    app_env: APP_ENV,
};

export default app_config;
