<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelpersTest extends TestCase
{
	/** @test */
	public function can_get_hostname()
	{
        $hostname = fetchHostByAddr('machine1.testdomain.local');
	    $hostnameA = fetchHostByAddr(['machine2.testdomain.local', 'testdomain.local', 'localhost']);
	    $hostnameB = fetchHostByAddr(['testdomain.local', 'machine3.testdomain.local', 'localhost']);

		$this->assertEquals('machine1', $hostname);
		$this->assertEquals('machine2', $hostnameA);
		$this->assertEquals('machine3', $hostnameB);
	}

	/** @test */
	public function can_generate_slug_with_valid_types()
	{
	    $slug = generateSlug('John Doe');
	    $slugA = generateSlug('jane doe');
	    $slugB = generateSlug('OSCAR MAYER WEINER');

	    $slugs = generateSlug(['ONE TWO', 'THREE FOUR', 'FIVE SIX']);

	    $this->assertEquals('john-doe', $slug);
	    $this->assertEquals('jane-doe', $slugA);
	    $this->assertEquals('oscar-mayer-weiner', $slugB);

   		$this->assertEquals('one-two', $slugs[0]);
   		$this->assertEquals('three-four', $slugs[1]);
   		$this->assertEquals('five-six', $slugs[2]);
	}
}