import Vue from "vue";

export default class Toaster {

    static code (code) {
        return {
            "404": "Not found",
            "422": "Not authorized",
            "500": "Network error"
        }[code];
    }

    static error (error) {
        let message = "Error";

        if (!error) error = this.code(status);
        if (typeof error === "string") message = error;

        if (typeof error === "object" && error.response) {
            let status = error.response.status;
            message = this.code(status) || error.response.data.message;
        }

        if (typeof error === "object" &&
            error.response &&
            error.response.data &&
            error.response.data.errors &&
            Object.keys(error.response.data.errors).length) {
            message = error.response.data.errors[Object.keys(error.response.data.errors)[0]][0];
        }

        Vue.prototype.$buefy.toast.open({
            message: message,
            position: 'is-bottom',
            type: 'is-danger'
        });
    }

    static message (message) {
        Vue.prototype.$buefy.toast.open({
            message: message,
            position: 'is-bottom'
        });
    }

}
