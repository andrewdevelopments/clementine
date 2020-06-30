module.exports = function(grunt) {
	grunt.initConfig({

		watch: {
			options: {
				spawn: false
			},
			scripts: {
				files: ['theme/scripts/*.js'],
				tasks: ['jshint']
			},
			sass: {
				files: ['theme/styles/*.{scss,sass}'],
				tasks: ['sass']
			},
			styles: {
				files: ['theme/styles/*.css']
			},
			html: {
				files: ['theme/*.html', 'theme/scripts/*.js']
			}
		},
		jshint: {
			all: {
				src: ['theme/scripts/main.js']
			}
		},
		cssmin: {
			options: {
                keepSpecialComments: 0,
                report: 'min'
            },
			minify: {
				expand: true,
				cwd: 'theme/styles/',
				src: ['main.css', '!*.min.css'],
				dest: 'theme/styles/',
				ext: '.min.css'
			}
		},
		sass: {
			options: {
				loadPath: 'theme/styles'
			},
			dist: {
				options: {
					loadPath: 'theme/styles',
					style: 'expanded'
				},
				files: {
					'theme/styles/main.css' : 'theme/styles/main.scss'
				}
			}
		},
		uglify: {
			options: {
				mangle: false
			},
			my_target: {
				files: {
					'theme/scripts/main.min.js' : ['theme/scripts/main.js']
				}
			}
		},

	});

	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('watch-me', ['uglify', 'cssmin', 'watch']);
};