<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Profile $profile, Plan $plan)
    {
        $this->profile = $profile;
        $this->plan = $plan;
    }

    public function profiles($idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if(!$plan)
        {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', [
            'profiles' => $profiles,
            'plan' => $plan
        ]);
    }


    public function plans($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if(!$profile)
        {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', [
            'profile' => $profile,
            'plans' => $plans
        ]);
    }
    

    public function profilesAvailable(Request $request, $idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if(!$plan)
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', [
            'profiles' => $profiles,
            'plan' => $plan,
            'filters' => $filters
        ]);
    }


    public function attachPlansProfile(Request $request, $idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if(!$plan)
        {
            return redirect()->back();
        }

        if(!$request->profiles || count($request->profiles) == 0)
        {
            return redirect()->back()->with('info', 'Precisa escolher ao menos um profile');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }


    public function detachPlanProfile($idPlan, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        $plan = $this->plan->find($idPlan);

        if(!$profile || !$plan)
        {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }
}
