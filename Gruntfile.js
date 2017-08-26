module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {

			options: {
			
			   separator: ';'
			},
			dist: {
			    // the files to concatenate
			    src: ['src/**/*.js'],
			    // the location of the resulting JS file
			    dest: 'dist/<%= pkg.name %>.js'
			}

			// options: {
			// 	separator: ';',
			// },
			// dist: {
			// 	src: ['./**/**.js'],
			// 	dest: 'public/script.js'
			// }

		},

		uglify: {
				options: {
			
					banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
				},
				dist: {
					files: {
						'dist/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
					}
				}
		},

		jshint: {
			
			files: ['Gruntfile.js','src/**/*.js','test/**/*.js'],
			
			options: {

				globals: {
					jQuery: true,
					console: true,
					module: true
				}
			}
		},

		watch: {
			files: ['src/**/*.js'],
			tasks: ['concat', 'uglify']
		}


	});
		
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');


	grunt.registerTask('test', ['concat','uglify']);

	grunt.registerTask('default', ['jshint', 'concat', 'uglify']);

};