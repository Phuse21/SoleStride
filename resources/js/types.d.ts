export {};

declare global {
    interface Window {
        axios: typeof import('axios');
    }
}