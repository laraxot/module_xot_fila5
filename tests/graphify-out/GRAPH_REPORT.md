# Graph Report - laravel/Modules/Xot/tests  (2026-08-27)

## Corpus Check
- 240 files · ~45,478 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 957 nodes · 1270 edges · 83 communities (44 shown, 39 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 30 edges (avg confidence: 0.8)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `4fb32576`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- TestCase
- HasTableWithoutOptionalMethodsTestClass
- HasTableWithoutOptionalMethodsTestClass
- HasTableWithXotTestClass
- HasTableWithXotTestClass
- PestExpectation
- XotBaseTestCase
- PestAssert
- HasCustomModelLabelProbeBase
- GetPdfContentByRecordActionTest
- Illuminate\Database\Eloquent\Model
- Modules\Xot\Filament\Resources\XotBaseResource
- PestStubs.php
- ReflectionMethod
- ModuleExecuteCoverage
- ModuleBusinessCoverage
- XotExecuteCoverage50Test.php
- XotBasePest
- ModuleRemainingCoverage
- Modules\Xot\Contracts\ExtraContract
- XotCovRelationHost
- PestTestCall
- Modules\Xot\Contracts\UserContract
- Modules\Xot\Filament\Traits\HasXotTable
- Modules\Xot\Models\XotBaseModel
- XotModuleSchema
- FilamentSchemaCoverage
- HasTableFunctionsCustomSlugProbe
- Modules\Xot\Models\BaseModel
- AssetActionsTest.php
- PestUsesChain
- XotForkedInvoke
- Modules\Xot\Models\Traits\HasExtraTrait
- XotWidgetFormHost
- XotBaseTransitionTest.php
- XotAbsWizard3
- TransKeyCaller
- Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm
- TestRelationManager.php
- Filament\Resources\Pages\CreateRecord
- Filament\Resources\Pages\EditRecord
- Filament\Resources\Pages\ListRecords
- Filament\Resources\Pages\ViewRecord
- HasCommonScopesProbe.php
- TestConcreteMorphPivot.php
- SafeEloquentCastFixture.php
- XotAbsCheckbox3.php
- XotAbsGroup3.php
- XotAbsRadio3.php
- XotAbsSection3.php
- XotAbsSelect3.php
- XotAbsTableAction3.php
- XotAbsViewColumn3.php
- XotFilamentRelationContract.php
- XotResPageStub
- NavigationPageLabelProbe.php
- XotMigrationDeepBranchesTest.php
- .getTable
- .getTable
- .getTable

## God Nodes (most connected - your core abstractions)
1. `TestCase` - 153 edges
2. `HasTableWithXotTestClass` - 52 edges
3. `HasTableWithoutOptionalMethodsTestClass` - 52 edges
4. `HasTableWithXotTestClass` - 52 edges
5. `HasTableWithoutOptionalMethodsTestClass` - 52 edges
6. `PestAssert` - 40 edges
7. `PestExpectation` - 40 edges
8. `ModuleBusinessCoverage` - 31 edges
9. `XotBaseTestCase` - 29 edges
10. `ModuleExecuteCoverage` - 28 edges

## Surprising Connections (you probably didn't know these)
- `HasCustomModelLabelProbeWithLabels` --inherits--> `HasCustomModelLabelProbeBase`  [EXTRACTED]
  laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeWithLabels.php → laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeBase.php
- `HasCustomModelLabelProbeWithoutLabels` --inherits--> `HasCustomModelLabelProbeBase`  [EXTRACTED]
  laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeWithoutLabels.php → laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeBase.php
- `ModelLabelFromPropertyProbe` --inherits--> `HasCustomModelLabelProbeBase`  [EXTRACTED]
  laravel/Modules/Xot/tests/Fixtures/Traits/ModelLabelFromPropertyProbe.php → laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeBase.php
- `BreadcrumbProbe` --inherits--> `HasCustomModelLabelProbeBase`  [EXTRACTED]
  laravel/Modules/Xot/tests/Fixtures/Traits/BreadcrumbProbe.php → laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeBase.php
- `ModelLabelFromModelNameProbe` --inherits--> `HasCustomModelLabelProbeBase`  [EXTRACTED]
  laravel/Modules/Xot/tests/Fixtures/Traits/ModelLabelFromModelNameProbe.php → laravel/Modules/Xot/tests/Fixtures/Stubs/HasCustomModelLabelProbeBase.php

## Import Cycles
- None detected.

## Communities (83 total, 39 thin omitted)

### Community 5 - "PestExpectation"
Cohesion: 0.09
Nodes (3): Countable, PestExpectation, self

### Community 6 - "XotBaseTestCase"
Cohesion: 0.06
Nodes (10): CreatesApplication, createApplication(), loadLaravelApplication(), Illuminate\Foundation\Application, Illuminate\Foundation\Testing\TestCase, Modules\Tenant\Models\Tenant, Modules\User\Models\Tenant, Modules\Xot\Models\Module (+2 more)

### Community 8 - "HasCustomModelLabelProbeBase"
Cohesion: 0.08
Nodes (12): HasCustomModelLabelProbeBase, HasCustomModelLabelProbeWithLabels, HasCustomModelLabelProbeWithoutLabels, BreadcrumbProbe, HasCustomModelLabelProbeBase, ModelLabelFromModelNameProbe, ModelLabelFromPropertyProbe, NavigationLabelFromPluralProbe (+4 more)

### Community 9 - "GetPdfContentByRecordActionTest"
Cohesion: 0.08
Nodes (7): GetPdfContentByRecordActionTest, FixStructureTest, makeXotModuleService(), Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction, Modules\Xot\Services\ModuleService, Nwidart\Modules\Module, Tests\TestCase

### Community 10 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.10
Nodes (9): DemoModel, BrokenAttributesModelForSafeArrayCast, Probe, ProbeBadAttachments, ProbeGoodAttachments, XotBaseTransitionFixture, Illuminate\Database\Eloquent\Model, DummyTestModel (+1 more)

### Community 11 - "Modules\Xot\Filament\Resources\XotBaseResource"
Cohesion: 0.10
Nodes (10): BackedEnum, MockResourceWithRelations, Filament\Schemas\Components\Wizard\Step, NavigationProbeResource, ProbeResource, XotCovManageRelated, XotFilamentResourceContract, Modules\Xot\Filament\Resources\XotBaseResource (+2 more)

### Community 12 - "PestStubs.php"
Cohesion: 0.15
Nodes (22): Illuminate\Contracts\Auth\Authenticatable, Illuminate\Testing\TestResponse, actingAs(), afterEach(), beforeEach(), delete(), deleteJson(), describe() (+14 more)

### Community 13 - "ReflectionMethod"
Cohesion: 0.16
Nodes (3): ReflectionClass, ReflectionMethod, ReflectionNamedType

### Community 15 - "ModuleBusinessCoverage"
Cohesion: 0.13
Nodes (3): ModuleBusinessCoverage, UserContract, ModuleDeepCoverage

### Community 16 - "XotExecuteCoverage50Test.php"
Cohesion: 0.12
Nodes (8): Builder, FakeQueryableModel, Illuminate\Database\Eloquent\Builder, Illuminate\Support\LazyCollection, LazyCollection, Mockery\MockInterface, xotModelRows(), Closure

### Community 17 - "XotBasePest"
Cohesion: 0.12
Nodes (3): Illuminate\Database\Eloquent\Collection, ReflectionType, XotBasePest

### Community 19 - "Modules\Xot\Contracts\ExtraContract"
Cohesion: 0.21
Nodes (6): ExtraModelFixture, ExtraModelTest, HasExtraMockExtra, self, Illuminate\Database\Eloquent\Relations\MorphTo, Modules\Xot\Contracts\ExtraContract

### Community 20 - "XotCovRelationHost"
Cohesion: 0.17
Nodes (7): XotCovMorphPivot, XotCovPivot, XotCovRelationHost, XotRefreshRecord, Illuminate\Database\Eloquent\Relations\MorphPivot, Illuminate\Database\Eloquent\Relations\Pivot, Modules\Xot\Models\Cache

### Community 22 - "Modules\Xot\Contracts\UserContract"
Cohesion: 0.16
Nodes (4): Closure, Model, UserContract, Modules\Xot\Contracts\UserContract

### Community 23 - "Modules\Xot\Filament\Traits\HasXotTable"
Cohesion: 0.21
Nodes (4): Filament\Tables\Table, Illuminate\Support\Collection, Modules\Xot\Filament\Traits\HasXotTable, Table

### Community 24 - "Modules\Xot\Models\XotBaseModel"
Cohesion: 0.19
Nodes (4): SchemalessTestModel, TestConcreteXotBaseModel, Modules\Xot\Models\XotBaseModel, Modules\Xot\Traits\HasSchemalessAttributes

### Community 25 - "XotModuleSchema"
Cohesion: 0.17
Nodes (3): Illuminate\Database\Migrations\Migration, Throwable, XotModuleSchema

### Community 27 - "HasTableFunctionsCustomSlugProbe"
Cohesion: 0.36
Nodes (3): HasTableFunctionsCustomSlugProbe, HasTableFunctionsTraitProbe, Modules\Xot\Traits\HasTableFunctionsTrait

### Community 30 - "PestUsesChain"
Cohesion: 0.43
Nodes (3): PestUsesChain, Closure, self

### Community 32 - "Modules\Xot\Models\Traits\HasExtraTrait"
Cohesion: 0.47
Nodes (3): HasExtraTraitProbeModel, TestModelHasExtra, Modules\Xot\Models\Traits\HasExtraTrait

### Community 34 - "XotBaseTransitionTest.php"
Cohesion: 0.50
Nodes (4): Modules\Notify\Datas\RecordNotificationData, RecordNotificationData, getNotificationRecipients(), sendRecipientNotification()

## Knowledge Gaps
- **39 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `TestCase` connect `TestCase` to `XotBaseTestCase`, `GetPdfContentByRecordActionTest`, `Illuminate\Database\Eloquent\Model`, `Modules\Xot\Filament\Resources\XotBaseResource`, `ReflectionMethod`, `XotExecuteCoverage50Test.php`, `Modules\Xot\Contracts\UserContract`, `Modules\Xot\Filament\Traits\HasXotTable`, `Modules\Xot\Models\XotBaseModel`, `Modules\Xot\Models\BaseModel`, `AssetActionsTest.php`, `XotBaseTransitionTest.php`, `FilamentSchemasTablesStructureTest.php`, `HasCsrfTokenTest.php`, `XotHundredPercentCoverageTest.php`, `XotMigrationDeepBranchesTest.php`, `SafeCastActionsTest.php`, `SafeObjectCastActionTest.php`, `EnumTraitTest.php`, `SafeArrayCastActionTest.php`, `SafeIntCastActionTest.php`, `XotBusinessCoverageTest.php`, `XotDeepCoverageTest.php`, `XotFilamentSchemaCoverageTest.php`?**
  _High betweenness centrality (0.387) - this node is a cross-community bridge._
- **Why does `PestAssert` connect `PestAssert` to `XotModuleSchema`, `.methodCallsDddx`, `PestExpectation`?**
  _High betweenness centrality (0.149) - this node is a cross-community bridge._
- **Why does `HasTableWithoutOptionalMethodsTestClass` connect `HasTableWithoutOptionalMethodsTestClass` to `.getTable`, `Modules\Xot\Filament\Traits\HasXotTable`?**
  _High betweenness centrality (0.084) - this node is a cross-community bridge._
- **Should `TestCase` be split into smaller, more focused modules?**
  _Cohesion score 0.02040816326530612 - nodes in this community are weakly interconnected._
- **Should `HasTableWithoutOptionalMethodsTestClass` be split into smaller, more focused modules?**
  _Cohesion score 0.04 - nodes in this community are weakly interconnected._
- **Should `HasTableWithoutOptionalMethodsTestClass` be split into smaller, more focused modules?**
  _Cohesion score 0.04 - nodes in this community are weakly interconnected._
- **Should `HasTableWithXotTestClass` be split into smaller, more focused modules?**
  _Cohesion score 0.04081632653061224 - nodes in this community are weakly interconnected._