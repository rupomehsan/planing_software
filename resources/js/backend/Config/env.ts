type app_config_type = {
    api_host: string;
    api_version: string;
    image_host: string;
};

let app_config: app_config_type = {
    // api_host: location.origin,
    api_host: "https://planning.techparkit.org",
    image_host: "https://planning.techparkit.org",
    // api_host: location.origin + ":8000",
    // image_host: location.origin + ":8000",
    api_version: "api/v1",
};

export default app_config;
