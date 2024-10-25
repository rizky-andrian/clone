/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                primary: "Arial",
            },
            fontSize: {
                tiny: "9px",
                xt: "8px",
            },
            colors: {
                "primary-color": "#180d51",
                "secondary-color": "#f5821f",
                "bg-primary": "#f7fafc",
                primary: "#083580",
                secondary: "#D4A51A",
                "caa-primary": "#0077BA",
                "caa-secondary": "#59C6F2",
                gold: "#FFA81E",
            },
            height: {
                hero: "332px",
                slider: "470px",
                banner: "669px",
                "card-artikel": "400px",
            },
            width: {
                banner: "1208px",
                hero: "1024px",
            },
            screens: {
                phone: { max: "390px" },
                tablet: { max: "640px" },
                laptop: { max: "1024px" },
            },
            borderRadius: {
                panel: "150px",
                panel1: "170px",
                custpanel: "50px",
            },
            screens: {
                hape: { max: "412px" },
                // => @media (min-width: 412px) { ... }

                tablet: "640px",
                // => @media (min-width: 640px) { ... }

                laptop: "1024px",
                // => @media (min-width: 1024px) { ... }

                desktop: "1280px",
                // => @media (min-width: 1280px) { ... }
            },
        },
    },
    plugins: [],
};
