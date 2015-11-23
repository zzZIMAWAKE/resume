<?php
	class Details
	{
		public function getName()
		{
			return 'Nicholas';
		}

		public function getEmail()
		{
			return '---@googlemail.com';
		}

		public function getTel()
		{
			return '+---';
		}

		public function getLocation()
		{
			return '---';
		}

		public function getDescription()
		{
			return 'BSc Software Engineering. Driven, '
					.'hardworking and a quick learner. '
					.'With a focus on full stack web development, '
					.'and keeping up to date with the latest '
					.'technologies. A passion for problem '
					.'solving with a focus on optimised solutions. '
					.'Seeking opportunities which will both '
					.'challenge and advance my skill set.';
		}

		public function getLanguages()
		{
			$languages = [
				'PHP' 		  => '2 years+',
				'Javascript'  => '2 years+',
				'HTML 4/5' 	  => '2 years+',
				'CSS2/3/LESS' => '2 years+',
				'SQL'		  => '3 years+',
				'C++'		  => '3 years+',
				'Ruby'	      => '< 1 year',
				'VB'		  => '1 year +',
			];

			return $languages;
		}

		public function getTechnologies()
		{
			$technologies = [
				'ZF2',
				'Git',
				'PHPUnit',
				'JQuery',
				'Bootstrap',
				'Wordpress',
			];
			
			return $technologies;
		}
		
		public function getWorkExperience()
		{
			$employer['---'] = [
				'period'   => 'July 2014 - Present',
				'role'	   => 'Graduate Web Developer',
				'lineOne'  => 'International serviced '
							  . 'apartment agency relying purely '
							  . 'on their online presence to acquire '
							  . 'business globally.',
				'bullets'  => [
					'Pivotal in the development of a full website '
					. 'redesign and migration, completed in just '
					. '8 months.',

					'Largest contributor in terms of ticket numbers '
					. 'during the course of the project',

					'Completely new codebase using Zend Framework '
					. '2 with a focus on clean maintainable code, '
					. 'a more productive system for internal users '
					. 'and an easier to use interface for clients. '
					. 'Extensive use of PHPUnit framework ensured any '
					. 'new code was production ready.',

					'Extensive use of Bootstrap to provide a completely '
					. 'responsive design and improve the experience for '
					. 'both internal and external users. Conversion rates '
					. 'improved immediately upon release of the update.',

					'Maintaining an AGILE environment throughout the '
					. 'development process to ensure tasks stayed on '
					. 'track and deadlines were met.',
				],
			];

			$employer['---'] = [
				'period'   => 'July 2011 - July 2012',
				'role'	   => 'Placement Software Engineer',
				'lineOne'  => 'Maintenance of hardware testing '
							   . 'suite used in the manufacturing process.',
				'bullets'  => [
					'Implementing new features to testing '
					. 'suite within a Visual Basic / C++ codebase.',

					'Solely responsible for the design and '
					. 'implementation of an automated testing suite, '
					. 'using Ruby, to ensure embedded software updates '
					. 'were functioning correctly during install.',

					'Working alongside overseas developers to provide '
					. 'solutions and discuss issues.',
				],
			];

			return $employer;
		}

		public function getEducation()
		{
			$education = [
				'degree' => '2:1 BSc Software Engineering '
							. '(Nottingham Trent University)',
				'a-levels' => 'A-levels: Psychology (C), Business '
							   . 'Studies (B), Politics (B)',
				'gcses'	   => 'GCSEs: Seven B grades, three C grades',
			];

			return $education;
		}

		public function getInterests()
		{
			return 'Competitive video games, travel and '
					. 'art. Keeping up with the latest technologies '
					. 'and developments within the industry.';
		}
	}