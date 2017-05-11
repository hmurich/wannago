module.exports = function(grunt){
	
 require("load-grunt-tasks")(grunt);

	grunt.initConfig({
		less: {
			style: {
				files: {
					"css/style.css": ["less/style.less"]
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ["Last 3 version", "ie 10"]
			},
			style: {
				src: "css/style.css"
			}
		},

		cssmin: {
			style: {
				options:{
					keepSpecialComments: 0
				},
				files:{
					"css/style.min.css":["css/style.css"]
				}
			}
		},

		watch: {
			styles: {
				files:['less/style.less'],
				tasks:['less'],
				options: {
					nospawn:true
				}
			}
		}

	});

	grunt.registerTask("css", [
			"less",
			"autoprefixer",
			"cssmin"
		]);
	grunt.registerTask('default', ['watch']);

		
};